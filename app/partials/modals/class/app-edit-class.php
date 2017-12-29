<div tabindex="-1" role="dialog" aria-labelledby="edit-class-info-label" class="modal in" id="edit-class-modal" data-school="<?php App::show($_SESSION['SESS_SCHOOL_TYP'])?>" data-fetch="../includes/actions/class/get-class.php">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="ti-blackboard"></i> Edit Class</h4>
            </div>
            <div class="modal-body">
                <form class="app-form" method="POST" action="../includes/actions/class/edit-class.php" id="edit-class">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Class Name</label>
                                <input name="class_name" type="text" class="form-control input-sm" placeholder="Class Name" id="class_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Class Code</label>
                                <input name="class_code" type="text" class="form-control input-sm" readonly="" placeholder="Class Code" id="class_code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course</label>
                                <select name="class_course" class="form-control input-sm" id="class_course">
                                    <option value="" readonly="" selected="">Select Course</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Class Teacher</label>
                                <input name="class_teacher" type="text" class="form-control input-sm" placeholder="Class Teacher" id="class_teacher">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" id="cancel-subjects-div">
                                <label>
                                    Class Subjects <a href="javascript:void(0)" id="edit-subjects"><small><i class="ti-pencil-alt"></i> Edit Subjects</small></a>
                                </label>
                                <p id="subject-list"></p>
                            </div>

                            <div class="form-group hidden" id="edit-subjects-div">
                                <label>Class Subjects <a href="javascript:void(0)" id="cancel-edit"><small><i class="ti-na"></i> Cancel</small></a></label>
                                <select name="class_subjects[]" class="form-control input-sm" id="class_subjects" multiple="multiple" style="width: 100%;">
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