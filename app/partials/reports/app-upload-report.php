<div class="row animated fadeIn" id="select-class-row">
    <div class="col-md-6 col-md-offset-3">
        <p></p>
        <div class="input-group">
            <select class="form-control" id="selected-class-upload">
                <option value="" selected="" disabled>Select a Class</option>
                <?php 
                    $school_code = User::userSession('SESS_USER_ID');
                    $classes = Classes::fetchClasses($school_code,"*");

                    foreach ($classes as $class): 
                ?>
                    <option value="<?php App::show($class['class_code'])?>"><?php App::show($class['class_name'])?></option>
                <?php endforeach ?>
            </select>
            <span class="input-group-btn">
                <button type="button" class="btn btn-outline btn-primary" id="select-class-upload">Submit</button>
            </span>
        </div>
    </div>
</div>

<div class="row hidden animated fadeIn" id="upload-report-row">
    <div class="col-md-6 col-md-offset-3">
        <form class="app-bulk-form" method="POST" action="" id="new-report-upload-bulk" enctype="multipart/form-data">
            <input class="hidden" id="class-code" value="" name="class-code"> 
            <div class="form-group">
                <div class="">
                    <input id="bulk_report_file" name="bulk_report_file" type="file" data-allowed-file-extensions="[&quot;csv&quot;]" class="file file-loading">
                    <p class="help-block"><small>{Instruction} <a href="#" id="cancel-upload">Cancel</a></small></p>
                </div>
            </div>
        </form>
    </div>
</div>


