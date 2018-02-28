<div class="row" id="query-class-row">
    <div class="col-md-6 col-md-offset-3">
        <p></p>
        <div class="input-group">
            <select class="form-control" id="selected-class-query">
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
                <button type="button" class="btn btn-outline btn-primary" id="select-class-query">Submit</button>
            </span>
        </div>
    </div>
</div>

<div class="row hidden animated fadeIn" id="query-report-row">
    
</div>