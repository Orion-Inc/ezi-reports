<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <div class="simple-page-form animated flipInY" id="reset-password-form">
            <h4 class="form-title m-b-xl text-center">Verify Your Account</h4>
            <form action="../includes/auth/verify-code.php" method="POST">
                <div class="form-group">
                    <input name="verify_code" type="text" class="form-control" placeholder="Enter Verification Code" id="verify_code" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <p class="text-center mt-10">We've sent you an email with a verification code.</p>
                <p class="text-center"><small>If you haven't received it <a href="#">Click Here</a></small></p>
            </form>
        </div>
        <div class="simple-page-footer animated zoomIn">
            <p>
                <small>Remember your password now?</small>
                <a href="?auth=login">Login</a>
            </p>
        </div>
    </div>
</div>