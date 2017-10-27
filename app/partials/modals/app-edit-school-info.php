<div tabindex="-1" role="dialog" aria-labelledby="edit-school-info-label" class="modal in" id="edit-school-info-modal" data-fetch="../includes/actions/school/get-school-info.php" data-backdrop="static">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-school-info-label" class="modal-title">School Information</h4>
            </div>
            <form class="app-form" method="POST" action="../includes/actions/school/edit-school-info.php" id="school-info">
                <input class="hidden" type="text" name="school_code" value="<?php App::show($_SESSION['SESS_USER_ID'])?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input id="school_name" type="text" class="form-control" name="school_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_motto">Motto</label>
                                <input id="school_motto" type="text" class="form-control" name="school_motto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_telephone">Telephone</label>
                                <input id="school_telephone" type="text" class="form-control" name="school_telephone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_email">Email</label>
                                <input id="school_email" type="email" class="form-control" name="school_email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_website">Website</label>
                                <input id="school_website" type="text" class="form-control" name="school_website">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_address">Address</label>
                                <input id="school_address" type="text" class="form-control" name="school_address">
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
