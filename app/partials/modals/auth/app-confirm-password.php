<div tabindex="-1" role="dialog" aria-labelledby="confirm-password-label" class="modal in" id="confirm-password-modal" data-backdrop="static" data-keyboard="false">
    <div role="document" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="../includes/actions/school/promote-students.php" id="promote-form">
                    <input type="hidden" name="school_code" value="<?php App::show($_SESSION['SESS_USER_ID']) ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">Please provide your Access Key</p>
                            <div class="form-group">
                                <input name="accessKey" type="password" class="form-control input-sm" placeholder="Access Key" id="accessKey" data-rule-required="true" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline btn-success">Continue</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
