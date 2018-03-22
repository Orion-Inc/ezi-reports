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
    <?php
		$errors = array();
		$school_code = $_SESSION['SESS_USER_ID'];
        $count = '';
        
        $students = (Student::getStudents($school_code) == false) ? 0 : count(Student::getStudents($school_code));
		$classrooms = (Classes::fetchClasses($school_code,"*") == false) ? 0 : count(Classes::fetchClasses($school_code,"*"));
		$totalCourses = Database::query("SELECT COUNT(DISTINCT `class_course`) FROM `ezi_school_class` WHERE `school_code` = '{$school_code}'")[0];
		

		$totalClassrooms = Database::query("SELECT COUNT(*) FROM `ezi_school_class`")[0];
		$classroomsPercent = @($classrooms/$totalClassrooms[0])*100;
	?>
    <div class="row">		
        <div class="col-md-3 col-sm-6 hidden">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Classrooms</h5>
                  	<div class="fs-36 fw-600 mb-20 counter" id="total-classrooms"><?php App::show($classrooms)?></div>
                  	<div data-percent="<?php App::show($classroomsPercent)?>" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-blackboard text-muted"></i>
                  	</div>
					<div class="clearfix mt-10">
                        <div class="pull-left">
							<div class="fs-12">Students</div>
							<div class="text-primary"><?php App::show($students);?></div>
						</div>
						<div class="pull-right">
							<div class="fs-12">Courses</div>
							<div class="text-primary"><?php App::show($totalCourses[0]);?></div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 col-sm-12">
        	<div class="row">
            	<div class="widget">
					<div class="widget-body">
						<div role="tabpanel">
							<ul role="tablist" class="nav nav-tabs mb-15">
								<li role="presentation" class="active">
									<a id="upload-tab" href="#upload" role="tab" data-toggle="tab" aria-controls="upload" aria-expanded="true">
										<i class="ti-upload fs-20"></i> <span class="hidden-xs">Upload</span>
									</a>
								</li>
								<li role="presentation">
									<a id="query-tab" href="#query" role="tab" data-toggle="tab" aria-controls="query" aria-expanded="false">
										<i class="ti-search fs-20"></i> <span class="hidden-xs">Query</span>
									</a>
								</li>
								<li role="presentation">
									<a id="template-tab" href="#template" role="tab" data-toggle="tab" aria-controls="template" aria-expanded="false">
										<i class="ti-receipt fs-20"></i> <span class="hidden-xs">Entry Template</span>
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="upload" role="tabpanel" aria-labelledby="upload-tab" class="tab-pane fade active in">
									<?php App::ViewPartial('upload-report','reports')?>
								</div>
								<div id="query" role="tabpanel" aria-labelledby="query-tab" class="tab-pane fade">
									<?php App::ViewPartial('query-report','reports')?>
								</div>
								<div id="template" role="tabpanel" aria-labelledby="query-tab" class="tab-pane fade">
									<?php App::ViewPartial('template-report','reports')?>
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
	App::ViewPartial('upload-report-progress', 'modals/reports');
	App::ViewPartial('edit-report-modal', 'modals/reports');
?>
<!-- jQuery Counter Up-->
    <script type="text/javascript" src="../plugins/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="../plugins/Counter-Up/jquery.counterup.min.js"></script>
<!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="../plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- Bootstrap File Input-->
	<script type="text/javascript" src="../plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
	<script type="text/javascript" src="../plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
<!-- Ajax Download-->
	<script type="text/javascript" src="../plugins/ajaxdownloader/ajaxdownloader.min.js"></script>

	<script type="text/javascript">

		$(".counter").counterUp({delay:10,time:1e3});

		$(".easy-pie-chart").easyPieChart({
			barColor:"#3498db",
			trackColor:"#E6E6E6",
			scaleColor:!1,
			scaleLength:0,
			lineCap:"round",
			lineWidth:10,
			size:140,
			animate:{duration:2e3,enabled:!0}
		});
	</script>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/reports/script.js"></script>