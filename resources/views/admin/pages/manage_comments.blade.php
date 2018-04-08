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
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Comment ID</th>
                        <th>Comments</th>
                        <th>Blog Name</th>
                        <th>Blog Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($comment_info as $v_comments)
                    {
                    ?>
                    <tr>
                        {{--comments id--}}
                        <td>{{$v_comments->comments_id}}</td>

                        {{--comments--}}
                        <td class="center">{{$v_comments->comments}}</td>

                        {{--blog name--}}
                        <td class="center">{{$v_comments->blog_id}}</td>

                        {{--blog category--}}
                        <td class="center">{{$v_comments->blog_id}}</td>

                        {{--comment published or not check status--}}
                        <td class="center">
                            <?php
                            if($v_comments->publication_status == 1)
                            {
                            ?>
                            <span class="label label-success">Published</span>
                            <?php
                            }
                            elseif($v_comments->publication_status == 0)
                            {
                            ?>
                            <span class="label label-danger">Unpublished</span>
                            <?php
                            }
                            ?>
                        </td>

                        {{--do published or unpublished / action--}}
                        <td class="center">
                            <?php
                            if($v_comments->publication_status == 1)
                            {
                            ?>
                            <a class="btn btn-danger"
                               href="{{URL::to('/unpublished-comments/'.$v_comments->comments_id)}}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>
                            <?php
                            }
                            elseif($v_comments->publication_status == 0)
                            {
                            ?>
                            <a class="btn btn-success"
                               href="{{URL::to('/published-comments/'.$v_comments->comments_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            <?php
                            }
                            ?>
                            {{--onclick e {@return} must else true/false whatever it is, it will delete--}}
                            <a class="btn btn-danger"
                               href="{{URL::to('/delete-comments/'.$v_comments->comments_id)}}"
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

    </div><!--/row-->
@endsection