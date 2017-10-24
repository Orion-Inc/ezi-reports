<div class="container page-container">
    <div class="page-content">
        <div class="logo"><i class="ti-files"></i></div>
        <h4 class="fs-16 text-white fw-300 mt-0">Forgot Password</h4>
        <p class="text-muted">Enter your unique school code to reset your password</p>
        <form method="POST" action="../includes/auth/recover.php" class="form-horizontal" id="recoveryForm">
            <div class="form-group">
                <input type="text" placeholder="Enter School Code" name="school_code" class="form-control" autocomplete="off">
            </div>
            <button type="submit" style="width: 130px" class="btn btn-primary btn-rounded">Reset</button>
        </form>
        <div class="clearfix">
            <a href="?login" class="inline-block form-control-static">Go Back</a>
        </div>
        <hr>
        <?php App::ViewPartial('version','app')?>
    </div>
</div> 