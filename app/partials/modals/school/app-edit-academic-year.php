<div tabindex="-1" role="dialog" aria-labelledby="edit-academic-year-label" class="modal in" id="edit-academic-year-modal" data-fetch="../includes/actions/school/get-academic-year.php">
    <div role="document" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-academic-year-label" class="modal-title">Academic Year</h4>
            </div>
            <form class="app-form" method="POST" action="../includes/actions/school/edit-academic-year.php" id="school-academic-year">
                <input class="hidden" type="text" name="school_code" value="<?php App::show($_SESSION['SESS_USER_ID'])?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group input-daterange">
                                <input id="term_from" type="text" class="date-year form-control input-sm" placeholder="From" data-rule-required="true">
                                <div class="input-group-addon"><b>-</b></div>
                                <input id="term_to" type="text" class="date-year form-control input-sm" placeholder="To" data-rule-required="true">
                            </div>
                        </div>
                        <input type="text" class="" name="school_current_academic_year" id="school_current_academic_year">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_name">Term</label>
                                <select class="form-control input-sm" id="school_academic_term" name="school_academic_term" data-rule-required="true">
                                    <option value="" selected="" disabled="">Select Current Term</option>
                                </select>
                            </div>
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