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
                        {!! Form::open(['url' => '/save-comments', 'method' => 'post']) !!}
                        <textarea rows="5" cols="30" name="comments" placeholder="Message"></textarea>
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="blog_id" value="{{$blog_info->blog_id}}">
                        <input type="submit" value="Comments"/>
                        {!! Form::close() !!}
                    @else
                        <h3><a href="{{URL::to('/login')}}">Login to comment</a></h3>
                    @endif
                    <h3 style="color: green">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', '');
                        }
                        ?>
                    </h3>
                </div>

                {{--Comment section--}}
                <div class="comments">
                    <h3>Comment</h3>
                <?php
                        $published_comments = DB::table('tbl_comments')
                            ->join('users', 'users.id', '=', 'tbl_comments.user_id')
                            ->select('tbl_comments.*', 'users.name')
                            ->where('publication_status', 1)
                            ->where('blog_id', $blog_info->blog_id)
                            ->get();
                        foreach ($published_comments as $v_comments)
                        {
                    ?>
                    <div class="comment-grid">
                        <img src="images/pic.png" alt=""/>
                        <div class="comment-info">
                            <h4>{{$v_comments->name}}</h4>
                            <p>{{$v_comments->comments}}</p>
                            <h5>{{$v_comments->created_at}}</h5>
                            {{--<a href="#">Reply</a>--}}
                        </div>
                        <?php
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection