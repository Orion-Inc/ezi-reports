<div tabindex="-1" role="dialog" aria-labelledby="edit-student-label" class="modal in" id="edit-student-modal" data-fetch="../includes/actions/student/get-student-info.php" data-school="<?php App::show($_SESSION['SESS_SCHOOL_TYP'])?>">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-student-label" class="modal-title"><i class="ti-user"></i> Edit Student</h4>
            </div>
            <div class="modal-body">
                <form class="app-student-form-wizard" method="POST" action="../includes/actions/student/edit-student.php" id="edit-student">
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
                                <div class="form-group">
                                    <label>Student Code</label>
                                    <input name="student_code" type="text" class="form-control input-sm" readonly="" placeholder="Student Code" id="student_code">
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
                                    <input name="guardian_name" type="text" class="form-control input-sm" placeholder="Last              First               Others" id="guardian_name">
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
                                    <input name="guardian_occupation" type="text" class="form-control input-sm" placeholder="Occupation" id="guardian_occupation">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="guardian_email" type="email" class="form-control input-sm" placeholder="Email Address" id="guardian_email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input name="guardian_telephone" type="text" class="form-control input-sm" placeholder="Telephone Number" id="guardian_telephone">
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
        </div>
    </div>
</div>
