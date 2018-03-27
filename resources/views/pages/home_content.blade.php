@extend('master')
@section('main_content')
<div class="col-md-8 content-main">
    <div class="content-grid">
        <div class="content-grid-head">
            <h3>POST OF THE DAY</h3>
            <h4>July 24, 2014,Posted by: <a href="#">Admin</a></h4>
            <div class="clearfix"></div>
        </div>
        <div class="content-grid-info">
            <h3><a href="single.html">MORBI IN SEM QUIS DUI</a></h3>
            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
            <img src="{{asset('front_end_asset/images/c1.jpg')}}" alt=""/>

            <!--eta web.php te jeye route e check korbe (blog-details ta-->
            <a class="bttn" href="{{URL::to('/blog-details')}}">MORE</a>
        </div>

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