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
                    Details
                    <div class="pull-right">
                        <small>Having Issues? <a href="mailto:" target="_blank">Contact Us</a></small>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-sm-8 col-md-8">
                        <?php App::ViewPartial('student-overview','student')?>
                    </div>
                    <div class="col-sm-4 col-md-2 col-md-offset-1 hidden-xs">
                        <?php App::ViewPartial('student-image','student')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>