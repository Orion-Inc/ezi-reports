<?php require_once('../includes/Autoloader.php'); ?>

<div class="page-header clearfix animated fadeIn">
    <div class="pull-left">
        <?php App::ViewPartial('breadcrumbs', '_html-blocks') ?>
    </div>
    <div class="pull-right">
        <?php App::ViewPartial('version', 'app') ?>
    </div>
</div>
<div class="page-content container-fluid animated fadeIn">
    <div class="row">		
        <div class="col-md-6 col-md-offset-3">
            <?php App::ViewPartial('promote-class', 'promote') ?>
        </div>
    </div>
</div>

<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/school/script.js"></script>