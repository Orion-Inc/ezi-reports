<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <div class="simple-page-form animated zoomIn" id="login-form">
            <h4 class="form-title m-b-xl text-center">Sign In With Your ezi-Account</h4>
            <form action="../includes/auth/login.php" method="POST">
                <div class="form-group">
                    <input id="eziAccountcode" name="eziAccountcode" type="text" class="form-control" placeholder="ezi-Account Code" required="" oninvalid="this.setCustomValidity('Please Enter Your eziAccountcode')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <input id="access_key" name="access_key" type="password" class="form-control" placeholder="Access Code" required="" oninvalid="this.setCustomValidity('Enter Your Access Code')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group m-b-xl">
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" id="keep_me_logged_in"/>
                        <label for="keep_me_logged_in">Keep me signed in</label>
                    </div>
                </div>
                <button class="btn btn-primary">Sign In</button>
            </form>
        </div>
        <div class="simple-page-footer animated zoomIn">
            <p><a href="?auth=forgot-password">Forgot Your Password?</a></p>
            <p>
                <small>Don't have an account?</small>
                <a href="#">Visit Our Website</a>
            </p>
        </div>
    </div>
</div>