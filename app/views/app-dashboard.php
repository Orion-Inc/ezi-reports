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
		$totalMalePopulation = Database::query("SELECT COUNT(`ezi_student`.`student_code`) FROM `ezi_student` JOIN `ezi_student_details` ON `ezi_student`.`student_code` = `ezi_student_details`.`student_code` WHERE `ezi_student`.`school_code` = '{$school_code}' AND `ezi_student_details`.`student_gender`= 'male' ")[0];
        $totalFemalePopulation = Database::query("SELECT COUNT(`ezi_student`.`student_code`) FROM `ezi_student` JOIN `ezi_student_details` ON `ezi_student`.`student_code` = `ezi_student_details`.`student_code` WHERE `ezi_student`.`school_code` = '{$school_code}' AND `ezi_student_details`.`student_gender`= 'female' ")[0];
		$totalStudents = Database::query("SELECT COUNT(*) FROM `ezi_student`")[0];
		$studentPercent = @($students/$totalStudents[0])*100;
		$totalMalePercent = number_format(@($totalMalePopulation[0]/$totalStudents[0])*100,2);
		$totalFemalePercent = number_format(@($totalFemalePopulation[0]/$totalStudents[0])*100,2);

		$classrooms = (Classes::fetchClasses($school_code,"*") == false) ? 0 : count(Classes::fetchClasses($school_code,"*"));
		$totalCourses = Database::query("SELECT COUNT(DISTINCT `class_course`) FROM `ezi_school_class` WHERE `school_code` = '{$school_code}'")[0];
		$totalSubjects = Database::query("SELECT `ezi_school_class_subject`.`class_subjects` FROM `ezi_school_class_subject` JOIN `ezi_school_class` ON `ezi_school_class`.`class_code`=`ezi_school_class_subject`.`class_code` WHERE `ezi_school_class`.`school_code`='{$school_code}'");
		$schoolSubjects = implode(',', array_column($totalSubjects, 'class_subjects'));
		$schoolSubjects = explode(',',$schoolSubjects);
		$subjectCount = count(array_unique($schoolSubjects));

		$totalClassrooms = Database::query("SELECT COUNT(*) FROM `ezi_school_class`")[0];
		$classroomsPercent = @($classrooms/$totalClassrooms[0])*100;
	?>
	<div class="row">
       	<div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Students</h5>
                  	<div class="fs-36 fw-600 mb-20 counter"><?php echo App::show($students)?></div>
                  	<div data-percent="<?php App::show($studentPercent)?>" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-user text-muted"></i>
                  	</div>
					<div class="clearfix mt-10">
						<div class="pull-left">
							<div class="fs-12">Male</div>
							<div class="text-primary"><?php App::show("<strong>".$totalMalePopulation[0]."</strong>"." (".$totalMalePercent."%)");?></div>
						</div>
						<div class="pull-right">
							<div class="fs-12">Female</div>
							<div class="text-primary"><?php App::show("<strong>".$totalFemalePopulation[0]."</strong>"." (".$totalFemalePercent."%)");?></div>
						</div>
					</div>
                </div>
            </div>
        </div>
		
        <div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Classrooms</h5>
                  	<div class="fs-36 fw-600 mb-20 counter" id="total-classrooms"><?php App::show($classrooms)?></div>
                  	<div data-percent="<?php App::show($classroomsPercent)?>" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-blackboard text-muted"></i>
                  	</div>
					<div class="clearfix mt-10">
						<div class="pull-left">
							<div class="fs-12">Courses</div>
							<div class="text-primary"><?php App::show($totalCourses[0]);?></div>
						</div>
						<div class="pull-right">
							<div class="fs-12">Subjects</div>
							<div class="text-primary"><?php App::show($subjectCount);?></div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
        	<div class="row">
            	
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