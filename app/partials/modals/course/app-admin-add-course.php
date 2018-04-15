<div tabindex="-1" role="dialog" aria-labelledby="admin-add-course-label" class="modal in" id="admin-add-course-modal">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="ti-book"></i> New Course</h4>
            </div>
            <div class="modal-body">
                <form class="app-form" method="POST" action="../includes/actions/course/admin-add-course.php" id="add-course">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input name="course_name" type="text" class="form-control input-sm" placeholder="Course Name" id="course_name" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Code</label>
                                <div class="input-group">
                                    <input name="course_code" type="text" class="form-control input-sm" readonly="" placeholder="Course Code" id="course_code" data-rule-required="true">
                                    <span class="input-group-btn">
                                        <a href="javascript:void(0)" class="btn btn-outline btn-default btn-sm" id="generateCode">
                                            <i class="ti-reload"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Type</label>
                                <select name="course_type" class="form-control input-sm" id="course_type" data-rule-required="true">
                                    <option value="" readonly="" selected="">Select Course Type</option>
                                    <option value="basic">Basic</option>
                                    <option value="secondary">Secondary</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="course_description" class="form-control input-sm" rows="4" id="course_description" placeholder="Type Course Description Here" data-rule-required="true"></textarea>
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