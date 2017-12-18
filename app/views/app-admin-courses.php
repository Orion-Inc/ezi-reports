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
	<div class="row">
        <div class="col-md-12">
          	<div class="widget">
        		<div class="widget-body">
        			<div class="row">
                        <div class="col-md-12">
                            <?php App::ViewPartial('admin-courses','courses')?>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </div>	

	
</div>
<?php 
    /*App::ViewPartial('admin-view-school','modals/school');
    App::ViewPartial('admin-view-school-crest','modals/school');
    App::ViewPartial('admin-edit-school-crest','modals/school');
    App::ViewPartial('admin-add-school','modals/school');
    App::ViewPartial('admin-edit-school','modals/school');*/
?>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/courses/admin-script.js"></script>