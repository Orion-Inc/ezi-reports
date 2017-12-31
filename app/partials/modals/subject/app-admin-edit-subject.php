<div tabindex="-1" role="dialog" aria-labelledby="admin-edit-subject-label" class="modal in" id="admin-edit-subject-modal" data-fetch="../includes/actions/subject/admin-get-subject-info.php">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="ti-book"></i> Edit Subject</h4>
            </div>
            <div class="modal-body">
                <form class="app-form" method="POST" action="../includes/actions/subject/admin-edit-subject.php" id="edit-subject">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subject Name</label>
                                <input name="subject_name" type="text" class="form-control input-sm" placeholder="Subject Name" id="subject_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subject Code</label>
                                <input name="subject_code" type="text" class="form-control input-sm" readonly="" placeholder="Subject Code" id="subject_code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assign Course</label>
                                <select name="course_code" class="form-control input-sm" id="course_code">
                                    <option value="" disabled="" selected="">Select Course to Assign this Subject</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="subject_description" class="form-control input-sm" rows="4" id="subject_description" placeholder="Type Course Description Here"></textarea>
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