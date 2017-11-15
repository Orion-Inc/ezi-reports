<div tabindex="-1" role="dialog" aria-labelledby="add-student-info-label" class="modal in" id="add-student-info-modal">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="add-student-info-label" class="modal-title">Add Student</h4>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div role="tabpanel">
                                    <ul role="tablist" class="nav nav-tabs nav-justified mb-15">
                                        <li role="presentation" class="active">
                                            <a id="enroll_tab" href="#single_tab" role="tab" data-toggle="tab" aria-controls="enroll_single" aria-expanded="true">Enroll Student</a>
                                        </li>
                                        <li role="presentation">
                                            <a id="bulk_enroll" href="#bulk_tab" role="tab" data-toggle="tab" aria-controls="enroll_bulk" aria-expanded="false">Bulk Enrollment</a>
                                        </li>
                                    </ul>
                        
                                    <div class="tab-content">
                                        <div id="enroll_single" role="tabpanel" aria-labelledby="single_tab" class="tab-pane fade active in">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                   
                                                    <div class="widget">
                                                        <div class="widget-body">
                                                            <form id="add-student-info" method="POST" action="../includes/action/add-student-info.php">
                                                                <h3>Primary Details</h3>
                                                                <fieldset>
                                                                    
                                                                    <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="txtFullName">Full Name</label>
                                                                            <input id="txtFullName" type="text" class="form-control" data-rule-required="true" data-rule-minlength="8">
                                                                        </div>
                                                                    </div>
                                                               
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="txtStdCode">Student Code</label>
                                                                            <input id="txtStdCode" type="text" class="form-control" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Date Of Birth</label>
                                                                                <div id ="dob" class="input-group date">
                                                                                     <input type="text" class="form-control" data-rule-required="true" data-rule-date="true"><span class="input-group-addon"><span class="ti-calendar"></span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtStdGender">Gender</label>
                                                                                <select id="txtStdGender" class="form-control">
                                                                                    <option value="male">Male</option>
                                                                                    <option value="female">Female</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">Course</label>
                                                                                <input id="txtStdCourse" type="text" class="form-control" data-rule-required="true">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtStdClass">Class</label>
                                                                                <select id="txtStdClass" class="form-control" data-rule-required="true">
                                                                                    <option value="" readonly="" selected="">Select a Class</option>
                                                                                    <option value=""></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtStdStatus">Status</label>
                                                                                <select id="txtStdStatus" class="form-control">
                                                                                    <option value="day">Day</option>
                                                                                    <option value="boarder">Boarder</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtHouse">House Name</label>
                                                                                <input id="txtHouse" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </fieldset>

                                                                <h3> Gaurdian Details </h3>
                                                                <fieldset>
                                                                    <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="txtGaurdianName">Gaurdian Name</label>
                                                                            <input id="txtGaurdianName" type="text" class="form-control" data-rule-required="true" data-rule-minlength="8">
                                                                        </div>
                                                                    </div>
                                                               
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="txtOccupation">Occupation</label>
                                                                            <input id="txtOccupation" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtContact">Contact1</label>
                                                                                <input id="txtContact" type="text" class="form-control" data-rule-required="true">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtContact2">Contact2</label>
                                                                                <input id="txtContact2" type="text" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtCity">City</label>
                                                                                <input id="txtCity" type="text" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="txtStreet">Street</label>
                                                                                <input id="txtStreet" type="text" class="form-control" data-rule-required="true">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </fieldset>
                                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pull-right">
                                                    <button type="button" name="btnNext" class="btn btn-sm btn-primary" data-toggle="widget" data-target="#add-student-info-modal">Next<i class="ti-arrow-right ml-5 mr-5"></i></button>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="enroll_bulk" role="tabpanel" aria-labelledby="bulk_tab" class="tab-pane fade">
                                            <div class="row">
                                                <div class="col-sm-10 col-md-10">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
           
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>