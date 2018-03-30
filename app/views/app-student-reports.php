<?php require_once ('../includes/Autoloader.php');?>

<div class="page-header clearfix animated fadeIn">
    <div class="pull-left">
        <?php App::ViewPartial('breadcrumbs','_html-blocks')?>
    </div>
    <div class="pull-right">
        <?php App::ViewPartial('version','app')?>
    </div>
</div>
<div class="page-content container-fluid animated fadeIn">
    <div class="col-md-10 col-md-offset-1">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    View Terminal Report
                    <div class="pull-right hidden-xs">
                        <small>Having Issues? <a href="mailto:" target="_blank">Contact Us</a></small>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <?php App::ViewPartial('student-query-report', 'reports') ?>
            </div>
        </div>
    </div>
</div>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/reports/student-script.js"></script>