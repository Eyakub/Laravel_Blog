@extend('master')
@section('main_content')
    <div class="col-md-8 content-main">
        <div class="content-grid">
            {{--<div class="content-grid-head">--}}
            {{--<h3>POST OF THE DAY</h3>--}}
            {{--<h4>July 24, 2014,Posted by: <a href="#">Admin</a></h4>--}}
            {{--<div class="clearfix"></div>--}}
            {{--</div>--}}

            @foreach($all_published_blog as $v_blog)
                <div class="content-grid-info">
                    <h3><a href="single.html">{{$v_blog->blog_title}}</a></h3>
                    <h4>{{$v_blog->created_at}} Posted by: <a href="#">{{$v_blog->author_name}}</a></h4>
                    <p>{!!$v_blog -> blog_short_description !!}</p>
                    <?php
                    if($v_blog->blog_image != NULL)
                    {
                    ?>
                    <img src="{{asset($v_blog->blog_image)}}" width="500" height="300" alt=""/>
                    <?php
                    }
                    ?>
                    <!--eta web.php te jeye route e check korbe (blog-details ta-->
                    <a class="bttn" href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}">MORE</a>
                </div>
            @endforeach

            <div class="pages">
                <ul>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection