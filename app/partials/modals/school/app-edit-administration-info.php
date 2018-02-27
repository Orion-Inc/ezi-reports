<div tabindex="-1" role="dialog" aria-labelledby="edit-administration-info-label" class="modal in" id="edit-administration-info-modal" data-fetch="../includes/actions/school/get-administration-info.php">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-administration-info-label" class="modal-title">Administration Information</h4>
            </div>
            <form class="app-form" method="POST" action="../includes/actions/school/edit-administration-info.php" id="school-administration-info">
                <input class="hidden" type="text" name="school_code" value="<?php App::show($_SESSION['SESS_USER_ID'])?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 col-md-3">
                            <div class="form-group">
                                <label for="school_head_title">Title</label>
                                <select class="form-control input-sm title" id="school_head_title" name="school_head_title" data-rule-required="true"></select>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-10 col-md-9">
                            <div class="form-group">
                                <label for="school_head_fullname">Head Full Name</label>
                                <input id="school_head_fullname" type="text" class="form-control input-sm name" name="school_head_fullname" placeholder="Enter Head's Full Name" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 col-md-3">
                            <div class="form-group">
                                <label for="school_ass_head_title">Title</label>
                                <select class="form-control input-sm title" name="school_ass_head_title" id="school_ass_head_title" data-rule-required="true"></select>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-10 col-md-9">
                            <div class="form-group">
                                <label for="school_ass_head_fullname">Assistant Head Full Name</label>
                                <input id="school_ass_head_fullname" type="text" class="form-control input-sm name" name="school_ass_head_fullname" placeholder="Enter Asst. Head's Full Name" data-rule-required="true">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 col-md-3">
                            <div class="form-group">
                                <label for="school_accountant_title">Title</label>
                                <select class="form-control input-sm title" id="school_accountant_title" name="school_accountant_title" data-rule-required="true"></select>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-10 col-md-9">
                            <div class="form-group">
                                <label for="school_accountant_fullname">Account Full Name</label>
                                <input id="school_accountant_fullname" type="text" class="form-control input-sm name" name="school_accountant_fullname" placeholder="Enter Accountant's Full Name" data-rule-required="true">
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