<div tabindex="-1" role="dialog" aria-labelledby="add-student-info-label" class="modal in" id="add-student-modal" data-school="<?php App::show($_SESSION['SESS_SCHOOL_TYP'])?>">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-student-picture-label" class="modal-title"><i class="ti-user"></i> Student</h4>
            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <ul role="tablist" class="nav nav-pills nav-justified mb-15">
                        <li role="presentation" class="active">
                            <a id="create-student-tab" href="#create-student" role="tab" data-toggle="tab" aria-controls="create-student" aria-expanded="true">
                                <i class="ti-wand"></i> Create New Student
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a id="bulk-student-tab" href="#bulk-student" role="tab" data-toggle="tab" aria-controls="bulk-student" aria-expanded="false">
                               <i class="ti-import"></i> Bulk Student Creation
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="create-student" role="tabpanel" aria-labelledby="create-student-tab" class="tab-pane fade active in">
                            <form class="app-student-form-wizard" method="POST" action="../includes/actions/student/add-new-student.php" id="new-student">
                                <h5 class="hidden">Primary Details</h5>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input name="student_name" type="text" class="form-control input-sm" placeholder="Last              First               Others" id="student_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Code</label>
                                            <div class="input-group">
                                                <input id="student_code" name="student_code" type="text" class="form-control input-sm" readonly="" placeholder="Student Code">
                                                <span class="input-group-btn">
                                                    <a href="javascript:void(0)" class="btn btn-outline btn-default btn-sm" id="generateCode">
                                                        <i class="ti-reload"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <div class="input-group date">
                                                    <input name="student_dob" type="date" class="form-control input-sm" id="student_dob" placeholder="Date of Birth">
                                                    <span class="input-group-addon">
                                                        <i class="ti-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div>
                                                    <div class="radio">
                                                        <label for="_male" class="radio-inline">
                                                            <input id="_male" type="radio" value="male" name="student_gender" checked="">Male
                                                        </label>
                                                        <label for="_female" class="radio-inline">
                                                            <input id="_female" type="radio" value="female" name="student_gender">Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <select name="student_course" class="form-control input-sm" id="student_course">
                                                    <option value="" readonly="" selected="">Select Course</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Class</label>
                                                <select name="student_class" class="form-control input-sm" id="student_class">
                                                    <option value="" readonly="" selected="">Select a Class</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <div>
                                                    <div class="radio">
                                                        <label for="_day" class="radio-inline">
                                                            <input id="_day" type="radio" value="day" name="student_status" checked="">Day
                                                        </label>
                                                        <label for="_boarding" class="radio-inline"> 
                                                            <input id="_boarding" type="radio" value="boarding" name="student_status">Boarding
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>House Name</label>
                                                <input name="student_house" type="text" class="form-control input-sm" placeholder="House Name" id="student_house">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h5 class="hidden">Guardian Details</h5>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Guardian Name</label>
                                                <input name="guardian_name" type="text" class="form-control input-sm" placeholder="Last              First               Others">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship</label>
                                                <select name="guardian_relationship" class="form-control input-sm" id="guardian_relationship">
                                                    <option value="" readonly="" selected="">Select an Option</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Occupation</label>
                                                <input name="guardian_occupation" type="text" class="form-control input-sm" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="guardian_email" type="email" class="form-control input-sm" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input name="guardian_telephone" type="text" class="form-control input-sm" placeholder="Telephone Number">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h5 class="hidden">Verify &amp; Complete</h5>
                                <fieldset>
                                    <p></p>
                                    <table class="table table-borderless table-condensed hidden">
                                        <tbody>
                                            <tr>
                                                <td>Student Name:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Course:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>House Name:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-borderless table-condensed hidden">
                                        <tbody>
                                            <tr>
                                                <td>Guardian Name:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Relationship:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Occupation:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Telephone:</td>
                                                <td><strong></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </form>
                        </div>
                        <div id="bulk-student" role="tabpanel" aria-labelledby="bulk-student-tab" class="tab-pane fade">
                            <form class="app-bulk-form" method="POST" action="../includes/actions/student/add-new-student-bulk.php" id="new-student-bulk">
                                <div class="form-group">
                                    <div class="">
                                        <input id="bulk_student_file" name="bulk_student_file" type="file" data-allowed-file-extensions="[&quot;csv&quot;]" class="file file-loading">
                                        <p class="help-block"><small>{Instruction}</small></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>