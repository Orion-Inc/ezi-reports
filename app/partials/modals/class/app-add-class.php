<div tabindex="-1" role="dialog" aria-labelledby="add-class-info-label" class="modal in" id="add-class-modal" data-school="<?php App::show($_SESSION['SESS_SCHOOL_TYP']) ?>">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="ti-blackboard"></i> New Class</h4>
            </div>
            <div class="modal-body pt-0">
                <form class="app-form" method="POST" action="../includes/actions/class/add-class.php" id="add-class">
                    <fieldset class="border">
                        <legend>Form 1</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <input name="class_name[form_1]" id="first_class_name"  type="text" class="form-control input-sm" onkeyup="generateCode('first_class_name','first_class_code')" placeholder="Class Name" data-rule-required="true">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Teacher</label>
                                    <input name="class_teacher[form_1]" type="text" class="form-control input-sm" placeholder="Class Teacher" data-rule-required="true">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Code</label>
                                    <input name="class_code[form_1]" id="first_class_code"  type="text" class="form-control input-sm" readonly="" placeholder="Class Code" data-rule-required="true">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border">
                        <legend>Form 2</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <input name="class_name[form_2]" id="second_class_name" type="text" class="form-control input-sm" onkeyup="generateCode('second_class_name','second_class_code')" placeholder="Class Name" data-rule-required="true">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Teacher</label>
                                    <input name="class_teacher[form_2]" type="text" class="form-control input-sm" placeholder="Class Teacher" data-rule-required="true">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Code</label>
                                    <input name="class_code[form_2]" id="second_class_code" type="text" class="form-control input-sm" readonly="" placeholder="Class Code" data-rule-required="true">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border">
                        <legend>Form 3</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <input name="class_name[form_3]" id="third_class_name" type="text" class="form-control input-sm" onkeyup="generateCode('third_class_name','third_class_code')" placeholder="Class Name" data-rule-required="true">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Teacher</label>
                                    <input name="class_teacher[form_3]" type="text" class="form-control input-sm" placeholder="Class Teacher" data-rule-required="true">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Code</label>
                                    <input name="class_code[form_3]" id="third_class_code" type="text" class="form-control input-sm" readonly="" placeholder="Class Code" data-rule-required="true">   
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Course</label>
                                <select name="class_course" class="form-control input-sm" id="class_course" data-rule-required="true">
                                    <option value="" readonly="" selected="">Select Course</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Class Subjects</label>
                                <select name="class_subjects[]" class="form-control input-sm" id="class_subjects" multiple="multiple" style="width: 100%" data-rule-required="true">
                                    <optgroup label="Select Course First">
                                        
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline btn-success">Submit</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>