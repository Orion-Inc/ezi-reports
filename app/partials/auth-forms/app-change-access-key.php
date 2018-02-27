<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title"><i class="ti-lock"></i> Change Access Key</h3>
    </div>
    <div class="widget-body">
        <div class="row">
            <div class="col-md-12">
                <form class="app-form" action="../includes/auth/change-access-key.php" method="POST" id="change-access-key">
                    <input class="hidden" name="user_code" value="<?php App::show($_SESSION['SESS_USER_ID']);?>">
                    <div class="form-group">
                        <label for="passwordInput">Old Access Key</label>
                        <input name="oldAccessKey" type="password" class="form-control" id="oldAccessKey" -placeholder="Enter Old Access Key" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">New Access Key</label>
                        <input name="newAccessKey" type="password" class="form-control" id="newAccessKey" autocomplete="off" -placeholder="Enter New Access Key" data-rule-required="true" data-rule-minlength="8">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Confirm Access Key</label>
                        <input name="confirmAccessKey" type="password" class="form-control" id="confirmAccessKey" autocomplete="off" -placeholder="Confirm Access Key" data-rule-required="true" data-rule-equalto="#newAccessKey">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Access Key</button>
                    <button type="reset" class="btn btn-default" onclick="$('#change-access-key').validate().resetForm();">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>