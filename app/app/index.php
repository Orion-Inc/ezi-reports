<?php require_once ('../includes/Autoloader.php');?>
<?php
    if (User::userSession('SESS_IS_AUTH') != true || empty($_SESSION['SESS_USER_ID'])) {
        header("Location: ../includes/auth/logout.php");
    }
    if (isset($_GET['token']) && $_GET['token'] != User::userSession('SESS_TOKEN')) {

        header("Location: ../includes/auth/logout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php App::ViewPartial('header','_html-blocks')?>
    <body data-sidebar-color="sidebar-light" class="sidebar-light">
        
        <!--App Navbar-->
            <?php App::ViewPartial('navbar','_html-blocks')?>
        <!--/App Navbar-->
        <div class="noscriptmsg">
            You don't have javascript enabled. Please enable and <a href="">Reload Page</a>
        </div>
        <div class="main-container">
            <!-- Main Sidebar start-->
                <?php App::ViewPartial('sidebar','_html-blocks')?>
            <!-- Main Sidebar end-->
            <!--Main Content-->
                <div class="page-container" id="page-content">
                    
                </div>
            <!--/Main Content-->
            <!-- Right Sidebar start-->
                <?php App::ViewPartial('sidebar-right','_html-blocks')?>
            <!-- Right Sidebar end-->
        </div>
        <!-- Scripts-->
            <noscript>
                <style type="text/css">
                    header {display:none;}
                    .main-container {display:none;}
                    .noscriptmsg {display:unset;}
                </style>
            </noscript>
            <?php App::ViewPartial('scripts','_html-blocks')?>
        <!-- /Scripts -->
    </body>
</html>