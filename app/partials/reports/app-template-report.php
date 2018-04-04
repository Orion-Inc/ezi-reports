<div class="row" id="template-download-row">
    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <p></p>
        <div class="input-group">
            <select class="form-control" id="selected-class-template"><i></i>
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
                <button type="button" class="btn btn-outline btn-primary" id="select-class-template"><i class="ti-download"></i> Download</button>
            </span>
        </div>
    </div>
    <div class="col-md-1 hidden animated fadeIn" id="template-download-row">
        <p></p>
        <img src="../assets/images/loading.gif" width="30px" height="30px"/>
    </div>
</div>