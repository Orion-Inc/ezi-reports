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
    App::ViewPartial('admin-view-course','modals/course');
    App::ViewPartial('admin-add-course','modals/course');
    App::ViewPartial('admin-edit-course','modals/course');
    App::ViewPartial('admin-add-subject','modals/course');
?>
<script type="text/javascript">
    $("[data-toggle='tooltip']").tooltip();
    $("[data-toggle='popover']").popover();
</script>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/courses/admin-script.js"></script>