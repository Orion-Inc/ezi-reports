<?php require_once ('../includes/Autoloader.php');?>

<?php if (@User::userSession('SESS_IS_AUTH') != true): ?>
    <script type="text/javascript">
        window.location.href='../includes/auth/logout.php';
    </script>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">
    <?php App::ViewPartial('header','_html-blocks')?>
    <body data-sidebar-color="sidebar-light" class="sidebar-light">
        <!--App Navbar-->
            <?php App::ViewPartial('navbar','_html-blocks')?>
        <!--/App Navbar-->
        <div class="main-container">
            <!-- Main Sidebar start-->
                <?php App::ViewPartial('sidebar','_html-blocks')?>
            <!-- Main Sidebar end-->
            <!--Main Content-->
                <div class="page-container" id="page-content">
                    <script type="text/javascript">
                        $('#page-content').load('../views/app-home.php?home');
                    </script>
                </div>
            <!--/Main Content-->
            <!-- Right Sidebar start-->
                <?php App::ViewPartial('sidebar-right','_html-blocks')?>
            <!-- Right Sidebar end-->
        </div>
        <!-- Scripts-->
            <?php App::ViewPartial('scripts','_html-blocks')?>
        <!-- /Scripts -->
    </body>
</html>