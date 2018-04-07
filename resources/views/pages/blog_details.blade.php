@extend('master')
@section('main_content')
<div class="col-md-8 content-main">
    <div class="content-grid">

        <div class="content-grid-single">
            <h3>{{$blog_info->blog_title}}</h3>
            <h4 style="margin-bottom: 15px">{{$blog_info->created_at}}Posted by: <a href="#">{{$blog_info->author_name}}</a> </h4>

            <img class="single-pic" src="{{asset($blog_info->blog_image)}}" alt="" height="300"/>
            <p>{!!$blog_info->blog_long_description!!}</p>

            <div class="content-form">
                <h3>Leave a comment</h3>
                <form>
                    <input type="text" placeholder="Name" required/>
                    <input type="text" placeholder="E-mail" required/>
                    <input type="text" placeholder="Phone" required/>
                    <textarea placeholder="Message"></textarea>
                    <input type="submit" value="SEND"/>
                </form>
            </div>
            <div class="comments">
                <h3>Comment</h3>
                <div class="comment-grid">
                    <img src="images/pic.png" alt=""/>
                    <div class="comment-info">
                        <h4>MARK JOHNSON</h4>
                        <p>Vivamus congue turpis in laoreet sem nec ultrices. Fusce blandit nunc vehicula massa vehicula tincidunt. Nam venenatis cursus urna sed gravida. Ut tincidunt elit ut quam malesuada consequat. Sed semper.</p>
                        <h5>On April 14, 2014, 18:01</h5>
                        <a href="#">Reply</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="comment-grid">
                    <img src="images/pic.png" alt=""/>
                    <div class="comment-info">
                        <h4>MARK JOHNSON</h4>
                        <p>Vivamus congue turpis in laoreet sem nec ultrices. Fusce blandit nunc vehicula massa vehicula tincidunt. Nam venenatis cursus urna sed gravida. Ut tincidunt elit ut quam malesuada consequat. Sed semper.</p>
                        <h5>On April 14, 2014, 18:01</h5>
                        <a href="#">Reply</a>
                    </div>
                    <div class="clearfix"></div>
                </div>	
            </div>
        </div>
    </div>
</div>
@endsection