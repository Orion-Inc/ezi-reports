<div class="row" id="query-class-row">
    <div class="col-md-12 col-lg-10 col-lg-offset-1">
        <p></p>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <select class="form-control" id="selected-class-query">
                    <option value="" selected="" disabled>Select Current Class</option>
                    <?php 
                    $school_code = User::userSession('SESS_USER_ID');
                    $classes = Classes::fetchClasses($school_code, "*");

                    foreach ($classes as $class) :
                    ?>
                        <option value="<?php App::show($class['class_code']) ?>"><?php App::show($class['class_name']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-lg-4 col-md-3">
                <select class="form-control" id="selected-year-query">
                    <option value="" selected="" disabled>Select Academic Year</option>
                    <?php 
                    $school_code = User::userSession('SESS_USER_SCHOOL');
                    $academic_year = Database::query("SELECT DISTINCT `academic_year` FROM `ezi_terminal_reports` WHERE `school_code` = '{$school_code}'");

                    foreach ($academic_year as $year) :
                    ?>
                        <option value="<?php App::show($year['academic_year']) ?>"><?php App::show($year['academic_year']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3">
                <select class="form-control" id="selected-term-query">
                
                </select>
            </div>
            <div class="col-lg-2 col-md-3">
                <button type="button" class="btn btn-outline btn-primary btn-block" id="select-class-query">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="row hidden animated fadeIn" id="query-report-row">
    
</div>