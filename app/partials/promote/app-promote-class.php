<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title"><i class="ti-user"></i><i class="ti-arrow-up"></i> Promote Students</h3>
    </div>
    <div class="widget-body">
        <div class="row" id="promote-field">
            
            <form class="" id="promote-class-form">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Current Class</label>
                        <select name="current_class" class="form-control input-sm" id="current_class" data-rule-required="true">
                            <option value="" readonly="" selected="">Select a Class</option>
                            <?php 
                            $school_code = User::userSession('SESS_USER_ID');
                            $classes = Classes::fetchClasses($school_code, "*");

                            foreach ($classes as $class) :
                            ?>
                                <option value="<?php App::show($class['class_code']) ?>"><?php App::show($class['class_name']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Next Class</label>
                        <select name="next_class" class="form-control input-sm" id="next_class" data-rule-required="true">
                            <option value="" readonly="" selected="">Select Current Class First</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline btn-success btn-block">Promote</button>
                </div>
            </form>
        </div>

        <div class="row" id="promote-status">
            
        </div>
    </div>
</div>