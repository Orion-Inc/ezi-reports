<?php
    $data = $_GET;

    $user_code = $data['x'];
    $token = $data['y'];
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <div class="simple-page-form animated zoomIn" id="login-form">
            <h4 class="form-title m-b-xl text-center">Change Access Code</h4>
            <form action="../includes/auth/" method="POST">
                <input type="-hidden" name="user[code]" value="<?php App::show($user_code)?>">
                <input type="-hidden" name="user[token]" value="<?php App::show($token)?>">

                <div class="form-group">
                    <input name="access_key" type="password" class="form-control" placeholder="New Access Code" required="" oninvalid="this.setCustomValidity('Enter Your Access Code')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <input name="confirm_access_key" type="password" class="form-control" placeholder="Confirm Access Code" required="" oninvalid="this.setCustomValidity('Enter Your Access Code')" oninput="setCustomValidity('')">
                </div>

                <button class="btn btn-primary">Change Access Key</button>
            </form>
        </div>
    </div>
</div>