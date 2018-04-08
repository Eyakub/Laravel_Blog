@extend('master')
@section('main_content')
    <div class="col-md-8 content-main">
        <div class="content-grid">

            <div class="content-grid-single">
                <h3>{{$blog_info->blog_title}}</h3>
                <h4 style="margin-bottom: 15px">{{$blog_info->created_at}}Posted by: <a
                            href="#">{{$blog_info->author_name}}</a><span>Total Hit: ({{$blog_info->hit_count}})</span>
                </h4>

                <img class="single-pic" src="{{asset($blog_info->blog_image)}}" alt="" height="300"/>
                <p>{!!$blog_info->blog_long_description!!}</p>

                <div class="content-form">
                    @if(Auth::user() != NULL)
                        <h3>Leave a comment</h3>
                        {!! Form::open(['url' => '/save-comment', 'method'=>'post']) !!}
                        <textarea rows="5" cols="30" name="comments" placeholder="Message"></textarea>
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="blog_id" value="{{$blog_info->blog_id}}">
                        <input type="submit" value="Comments"/>
                        {!! Form::close() !!}
                    @else
                        <h3><a href="{{URL::to('/login')}}">Login to comment</a></h3>
                    @endif
                </div>
                <div class="comments">
                    <h3>Comment</h3>
                    <div class="comment-grid">
                        <img src="images/pic.png" alt=""/>
                        <div class="comment-info">
                            <h4>MARK JOHNSON</h4>
                            <p>Vivamus congue turpis in laoreet sem nec ultrices. Fusce blandit nunc vehicula massa
                                vehicula tincidunt. Nam venenatis cursus urna sed gravida. Ut tincidunt elit ut quam
                                malesuada consequat. Sed semper.</p>
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