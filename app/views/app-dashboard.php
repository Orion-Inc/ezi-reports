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

		$students = (Student::getStudents($school_code) == false) ? 0 : count(Student::getStudents($school_code));
		$totalStudents = Database::query("SELECT COUNT(*) FROM `ezi_student`")[0];
		$studentPercent = @($students/$totalStudents[0])*100;



		$classrooms = (Classes::fetchClasses($school_code,"*") == false) ? 0 : count(Classes::fetchClasses($school_code,"*"));
		$totalClassrooms = Database::query("SELECT COUNT(*) FROM `ezi_school_class`")[0];
		$classroomsPercent = @($classrooms/$totalClassrooms[0])*100;
	?>
	<div class="row">
       	<div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Students</h5>
                  	<div class="fs-36 fw-600 mb-20 counter"><?php echo $students?></div>
                  	<div data-percent="<?php App::show($studentPercent)?>" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-user text-muted"></i>
                  	</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Classrooms</h5>
                  	<div class="fs-36 fw-600 mb-20 counter" id="total-classrooms"><?php echo $classrooms?></div>
                  	<div data-percent="<?php App::show($classroomsPercent)?>" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-blackboard text-muted"></i>
                  	</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
        	<div class="row">
        		<div class="col-md-12">
                  	<div class="mb-20">
                    	<div class="media">
	                      	<div class="media-body">
	                        	<h5 class="media-heading">Total Revenue</h5>
	                        	<div class="fs-24 fw-600">GHS <span class="counter">0.00</span></div>
	                      	</div>
	                      	<div class="media-right"><i class="fs-30 "></i></div>
	                    </div>
                    </div>
            	</div>

            	<div class="col-md-12">
                  	<div class="mb-20">
                    	<div class="media">
	                      	<div class="media-body">
	                        	<h5 class="media-heading">Total Revenue</h5>
	                        	<div class="fs-24 fw-600">GHS <span class="counter">0.00</span></div>
	                      	</div>
	                      	<div class="media-right"><i class="fs-30 "></i></div>
	                    </div>
                    </div>
            	</div>

            	<div class="col-md-12">
                  	<div class="mb-20">
	                    <div class="media">
	                      	<div class="media-body">
	                        	<h5 class="media-heading">
	                        		Task Completed
	                        	</h5>
	                        	<div class="fs-24 fw-600 counter">0</div>
	                      	</div>
	                      	<div class="media-right"><i class="fs-30 ti-stats-up"></i></div>
	                    </div>
	                    <ul class="list-unstyled">
	                      	<li>
	                        	<div class="block clearfix mb-5">
	                        		<span class="pull-left fs-12">Today</span>
	                        		<span class="pull-right label label-outline label-primary">0%</span>
	                        	</div>
	                        	<div class="progress progress-xs">
	                          		<div role="progressbar" data-transitiongoal="0" class="progress-bar" aria-valuenow="0">
	                          			
	                          		</div>
	                        	</div>
	                      	</li>
	                      	<li>
		                        <div class="block clearfix mb-5">
		                        	<span class="pull-left fs-12">Yesterday</span>
		                        	<span class="pull-right label label-outline label-success">0%</span>
		                        </div>
		                        <div class="progress progress-xs">
		                          	<div role="progressbar" data-transitiongoal="0" class="progress-bar progress-bar-success" aria-valuenow="0">
		                          		
		                          	</div>
		                        </div>
	                      	</li>
	                    </ul>
                  	</div>
                </div>
        	</div>
        </div>
    </div>


	
</div>

<!-- jQuery Counter Up-->
    <script type="text/javascript" src="../plugins/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="../plugins/Counter-Up/jquery.counterup.min.js"></script>
<!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="../plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
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