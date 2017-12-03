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
        			<div role="tabpanel">
                        <ul role="tablist" class="nav nav-tabs mb-15">
                            <li role="presentation" class="active">
                                <a id="school-classes-tab" href="#school-classes" role="tab" data-toggle="tab" aria-controls="school-classes" aria-expanded="true">
                                    Classes
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <div id="school-classes" role="tabpanel" aria-labelledby="school-classes-tab" class="tab-pane active fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                       <?php App::ViewPartial('school-classes-overview-tab','class')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</div>
<?php 
    App::ViewPartial('view-class','modals/class');
    App::ViewPartial('view-class-subjects','modals/class');
    App::ViewPartial('add-class','modals/class');
    App::ViewPartial('edit-class','modals/class');
?>
<!-- Bootstrap File Input-->
<script type="text/javascript" src="../plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script type="text/javascript" src="../plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/class/script.js"></script>

