<div class="container page-container">
    <div class="page-content">
        <div class="logo"><i class="ti-files"></i></div>
        <form method="POST" action="../includes/auth/admin-login.php" class="form-horizontal" id="loginForm">
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" placeholder="Username" name="username" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="password" placeholder="Passowrd" name="password" class="form-control" autocomplete="off">
                </div>
            </div>
            <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Sign in</button>
        </form>
        <hr>
        <?php App::ViewPartial('version','app')?>
        <div class="clearfix hidden">
            <p class="text-muted mb-0 pull-left">Want new account?</p>
            <a href="register.html" class="inline-block pull-right">Sign Up</a>
        </div>
    </div>
</div>