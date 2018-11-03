@extend('admin.admin_master')
@section('admin_main_content')
    <script type="text/javascript">
        {{--this function getting confirmation from user to delete category or not--}}
        function check_delete() {
            chk = confirm("Confirm Delete ?");
            if (chk) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <h3 style="color: green;">
                <?php
                echo Session::get('message');
                Session::put('message', '');
                ?>
            </h3>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Blog ID</th>
                        <th>Blog Title</th>
                        <th>Blog Category</th>
                        <th>Blog Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($blog_info as $v_blog)
                    {
                    ?>
                    <tr>

                        <td>{{$v_blog->blog_id}}</td>

                        <td class="center">{{$v_blog->blog_title}}</td>

                        {{--fetching category name via tb1_blog table--}}
                        <?php
                        $category_id = $v_blog->category_id;
                        $category_info = DB::table('tbl_category')
                            ->where('category_id', $category_id)
                            ->value('category_name');
                        ?>
                        <td class="center"><?php echo $category_info;?></td>

                        <td>
                            @if($v_blog->blog_image !== NULL)
                                <img src="{{asset(($v_blog->blog_image))}}" alt="img" height="30" width="70">
                            @endif
                        </td>

                        <td class="center">
                            <?php
                            if($v_blog->publication_status === 1)
                            {
                            ?>
                            <span class="label label-success">Published</span>
                            <?php
                            }
                            elseif($v_blog->publication_status === 0)
                            {
                            ?>
                            <span class="label label-danger">Unpublished</span>
                            <?php
                            }
                            ?>
                        </td>

                        <td class="center">
                            <?php
                            if($v_blog->publication_status === 1)
                            {
                            ?>
                            <a class="btn btn-danger"
                               href="{{URL::to('/unpublished-blog/'.$v_blog->blog_id)}}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>
                            <?php
                            }
                            elseif($v_blog->publication_status === 0)
                            {
                            ?>
                            <a class="btn btn-success"
                               href="{{URL::to('/published-blog/'.$v_blog->blog_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            <?php
                            }
                            ?>
                            <a class="btn btn-info"
                               href="{{URL::to('/edit-blog/'.$v_blog->blog_id)}}">
                                {{--href="{{URL::to('/add-blog')}}" >--}}
                                <i class="halflings-icon white edit"></i>
                            </a>
                            {{--onclick e {@return} must else true/false whatever it is, it will delete--}}
                            <a class="btn btn-danger"
                               href="{{URL::to('/delete-blog/'.$v_blog->blog_id)}}"
                               onclick="return check_delete();">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>

                </table>
            </div>
        </div><!--/span-->

    </div>

@endsection