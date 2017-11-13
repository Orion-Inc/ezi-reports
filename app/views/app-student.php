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
                                <a id="students-overview-tab" href="#students-overview" role="tab" data-toggle="tab" aria-controls="students-overview" aria-expanded="true">
                                    Students Overview
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a id="classes-tab" href="#classes" role="tab" data-toggle="tab" aria-controls="classes" aria-expanded="true">
                                    Class
                                </a>
                            </li>
                            <li role="presentation" class="hidden">
                                <a id="academic-year-tab" href="#academic-year" role="tab" data-toggle="tab" aria-controls="academic-year" aria-expanded="true">
                                    Academic Year
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <div id="students-overview" role="tabpanel" aria-labelledby="overview-tab" class="tab-pane fade active in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php App::ViewPartial('students-overview-tab','student')?>
                                    </div>
                                </div>
                            </div>

                            <div id="classes" role="tabpanel" aria-labelledby="classes-tab" class="tab-pane fade in">
                                <div class="row">
                                    <?php App::ViewPartial('school-classes-overview-tab','class')?>
                                </div>
                            </div>

                            <div id="academic-year" role="tabpanel" aria-labelledby="academic-year-tab" class="tab-pane fade in">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</div>
<?php App::ViewPartial('view-student','modals/student')?>
<?php App::ViewPartial('add-student','modals/student')?>
<?php App::ViewPartial('edit-student','modals/student')?>
<!-- Bootstrap File Input-->
<script type="text/javascript" src="../plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script type="text/javascript" src="../plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/student/script.js"></script>

