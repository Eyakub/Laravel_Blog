@extend('admin.admin_master')
@section('admin_main_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('dashboard')}}">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 style="color:green; margin-left: 10px">
            <?php
            echo Session::get('message');
            Session::put('message', '');
            ?>
        </h3>
        <div class="box-content">
            {!! Form::open(['url' => '/save-category', 'method'=>'post']) !!}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="category_name" id="typeahead"  >
                        </div>
                    </div>
                    <!--                    <div class="control-group">
                                            <label class="control-label" for="date01">Date input</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">
                                            </div>
                                        </div>-->

                    <!--                    <div class="control-group">
                                            <label class="control-label" for="fileInput">File input</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="fileInput" type="file">
                                            </div>
                                        </div>          -->
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="category_description" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status </label>
                        <div class="controls">
                            <select name='publication_status'>
                                <option>Select Status</option>
                                <option value='1'>Published</option>
                                <option value='0'>Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            {!! Form::close() !!} 

        </div>
    </div><!--/span-->

</div><!--/row-->


@endsection