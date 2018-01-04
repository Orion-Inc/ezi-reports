<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <div class="simple-page-form animated flipInY" id="reset-password-form">
            <h4 class="form-title m-b-xl text-center">Forgot Your Password?</h4>

            <form action="../includes/auth/reset-password.php" method="POST">
                <div class="form-group">
                    <input name="code_email" type="text" class="form-control" placeholder="Enter Your Email Address or User Code" id="code_email" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
        <div class="simple-page-footer animated zoomIn">
            <p><a href="?auth=login">Go Back</a></p>
            <p>
                <small>Don't have an account?</small>
                <a href="#">Visit Our Website</a>
            </p>
        </div>
    </div>
</div>