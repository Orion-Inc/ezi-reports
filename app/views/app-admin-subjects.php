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
        <div class="col-md-3">
            <div class="widget text-center">
                <?php
                    $errors = array();

                    $totalCourses = Database::query("SELECT COUNT(`course_code`) FROM `ezi_course`")[0];
                    $totalSubjects = Database::query("SELECT COUNT(`subject_code`) FROM `ezi_subjects`")[0];

                    $courses = $totalCourses[0];
                    $subjects = $totalSubjects[0];
                    
                    $coursePercent = @($courses/$subjects)*100;
                ?>
                <div class="widget-body">
                    <h5 class="mb-5">Total Courses</h5>
                    <div class="fs-36 fw-600 mb-20 counter"><?php echo $courses?></div>
                    <div data-percent="<?php App::show($coursePercent)?>" class="easy-pie-chart fs-36 bar-track">
                        <i class="ti-home text-muted"></i>
                    </div>
                    <div class="clearfix mt-10 ml-10 mr-10">
                        <div class="pull-left">
                            <div class="fs-12">Basic</div>
                            <div class="text-primary"><?php echo '';?></div>
                        </div>
                        <div class="pull-right">
                            <div class="fs-12">Secondary</div>
                            <div class="text-primary"><?php echo '';?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
          	<div class="widget">
        		<div class="widget-body">
                    <?php App::ViewPartial('admin-subjects','subjects')?>
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
<?php 
    App::ViewPartial('admin-add-subject','modals/subject');
    App::ViewPartial('admin-edit-subject','modals/subject');
?>
<!-- Custom Script -->
<script type="text/javascript" src="../build/js/page-content/subjects/admin-script.js"></script>