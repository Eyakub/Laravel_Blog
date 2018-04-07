@extend('admin.admin_master')
@section('admin_main_content')
    {{--<script type="text/javascript">--}}
    {{--this function getting confirmation from user to delete category or not--}}
    {{--function check_delete() {--}}
    {{--chk = confirm("Confirm Delete ?");--}}
    {{--if (chk) {--}}
    {{--return true;--}}
    {{--}--}}
    {{--else {--}}
    {{--return false;--}}
    {{--}--}}
    {{--}--}}
    {{--</script>--}}

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
                        <th>Blog ID</th>
                        <th>Blog Title</th>
                        <th>Blog Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div><!--/span-->

    </div>

@endsection