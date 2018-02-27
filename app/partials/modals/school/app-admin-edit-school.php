<div tabindex="-1" role="dialog" aria-labelledby="edit-school-label" class="modal in" id="admin-edit-school-modal" data-fetch="../includes/actions/school/get-school-info.php">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-school-label" class="modal-title"><i class="ti-user"></i> Edit School</h4>
            </div>
            <div class="modal-body">
                <form class="app-form" method="POST" action="../includes/actions/school/admin-edit-school.php" id="edit-school" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>School Name</label>
                                <input name="school_name" type="text" class="form-control input-sm" placeholder="School Name" id="school_name" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Type</label>
                                <select name="school_type" class="form-control input-sm" id="school_type" data-rule-required="true">
                                    <option value="" selected="" disabled="">Select School Type</option>
                                    <option value="basic">Basic</option>
                                    <option value="secondary">Secondary</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Code</label>
                                <input name="school_code" type="text" class="form-control input-sm" readonly="" placeholder="School Code" id="school_code" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_motto">Motto</label>
                                <input id="school_motto" type="text" class="form-control input-sm" name="school_motto" placeholder="Motto" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_telephone">Telephone</label>
                                <input id="school_telephone" type="text" class="form-control input-sm" name="school_telephone" placeholder="Telephone Number" data-rule-required="true" data-rule-digits="true" data-rule-minlength="10" data-rule-maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location</label>
                                <input name="school_location" type="text" class="form-control input-sm" placeholder="School Location" id="school_location" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_website">Website</label>
                                <input id="school_website" type="text" class="form-control input-sm" name="school_website" placeholder="Website" data-rule-required="true" data-rule-url="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_email">Email</label>
                                <input id="school_email" type="email" class="form-control input-sm" name="school_email" placeholder="Email Address" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_address">Address</label>
                                <input id="school_address" type="text" class="form-control input-sm" name="school_address" placeholder="Address" data-rule-required="true">
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
