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

        $totalSchools = Database::query("SELECT COUNT(`school_code`) FROM `ezi_school`")[0];
        $totalBasicSchools = Database::query("SELECT COUNT(`school_code`) FROM `ezi_school` WHERE `school_type`='basic'")[0];
        $totalSecondarySchools = Database::query("SELECT COUNT(`school_code`) FROM `ezi_school` WHERE `school_type`='secondary'")[0];
        $schools = $totalSchools[0];
        
        $totalStudents = Database::query("SELECT COUNT(`student_code`) FROM `ezi_student`")[0];
        $totalMalePopulation = Database::query("SELECT COUNT(`student_code`) FROM `ezi_student_details` WHERE `student_gender`='male'")[0];
        $totalFemalePopulation = Database::query("SELECT COUNT(`student_code`) FROM `ezi_student_details` WHERE `student_gender`='female'")[0];
        $students = $totalStudents[0];

        $schoolPercent = @($schools/$totalSchools[0])*100;
        $studentPercent = @($students/$totalStudents[0])*100;

        $totalBasicSchoolsPercent = number_format(@($totalBasicSchools[0]/$totalSchools[0])*100,2);
        $totalSecondarySchoolsPercent = number_format(@($totalSecondarySchools[0]/$totalSchools[0])*100,2);

        $totalMalePopulationPercent = number_format(@($totalMalePopulation[0]/$totalStudents[0])*100,2);
        $totalFemalePopulationPercent = number_format(@($totalFemalePopulation[0]/$totalStudents[0])*100,2);
        
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="widget clear">
                <div class="widget-heading clearfix">
                    <h3 class="widget-title pull-left">Overview <small class="hidden-xs">(Statistics, Site Traffic etc.)</small></h3>
                    <ul class="widget-tools pull-right list-inline">
                        <li><a href="#edit-academic-year-modal" class="" data-toggle="modal"><i class="ti-calendar visible-xs"></i><span class="hidden-xs">Change Academic Year</span></a></li>
                        <li><a href="javascript:void(0);" class="widget-collapse"><i class="ti-angle-up"></i></a></li>
                        <li><a href="javascript:void(0);" class="widget-reload"><i class="ti-reload"></i></a></li>
                    </ul>
                </div>
                <div class="widget-body">
                    <div class="row">
                    	<div class="col-md-6">
                            <div class="col-md-6">
                                <div class="widget text-center">
                                    <div class="widget-body">
                                        <h5 class="mb-5">Total Schools</h5>
                                        <div class="fs-36 fw-600 mb-20 counter"><?php echo $schools?></div>
                                        <div data-percent="<?php App::show($schoolPercent)?>" class="easy-pie-chart fs-36 bar-track">
                                            <i class="ti-home text-muted"></i>
                                        </div>
                                        <div class="clearfix mt-10 ml-10 mr-10">
                                            <div class="pull-left">
                                                <div class="fs-12">Basic</div>
                                                <div class="text-primary"><?php App::show("<strong>".$totalBasicSchools[0]."</strong>"." (".$totalBasicSchoolsPercent."%)");?></div>
                                            </div>
                                            <div class="pull-right">
                                                <div class="fs-12">Secondary</div>
                                                <div class="text-primary"><?php App::show("<strong>".$totalSecondarySchools[0]."</strong>"." (".$totalSecondarySchoolsPercent."%)");?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="widget text-center">
                                    <div class="widget-body">
                                        <h5 class="mb-5">Total Students</h5>
                                        <div class="fs-36 fw-600 mb-20 counter" id="total-students"><?php echo $students?></div>
                                        <div data-percent="<?php App::show($studentPercent)?>" class="easy-pie-chart fs-36 bar-track">
                                            <i class="ti-user text-muted"></i>
                                        </div>
                                        <div class="clearfix mt-10 ml-10 mr-10">
                                            <div class="pull-left">
                                                <div class="fs-12">Male</div>
                                                <div class="text-primary"><?php echo "<strong>".$totalMalePopulation[0]."</strong>"." (".$totalMalePopulationPercent."%)";?></div>
                                            </div>
                                            <div class="pull-right">
                                                <div class="fs-12">Female</div>
                                                <div class="text-primary"><?php echo "<strong>".$totalFemalePopulation[0]."</strong>"." (".$totalFemalePopulationPercent."%)";?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover mt-20">
                                    <thead>
		                            	<tr>
                                            <th style="width:10%">#</th>
                                            <th style="width:40%">Browser</th>
                                            <th style="width:25%">Sessions</th>
		                            	</tr>
                                    </thead>
                                    <tbody>
                                        <?php App::ViewPartial('admin-sessions', 'dashboard') ?>
                                    </tbody>
		                        </table>
	                        </div>
                    	</div>
                    </div>
                </div>
            </div>
            <div class="widget clear">
                <div class="widget-heading clearfix">
                    <h3 class="widget-title pull-left">Notifications <small>(Messages, Alerts etc.)</small></h3>
                    <ul class="widget-tools pull-right list-inline">
                        <li><a href="javascript:void(0);" class="widget-collapse"><i class="ti-angle-up"></i></a></li>
                        <li><a href="javascript:void(0);" class="widget-reload"><i class="ti-reload"></i></a></li>
                    </ul>
                </div>
                <div class="widget-body">
                    <div class="row">
                    	<div class="col-md-12">
                            <div role="tabpanel">
                                <ul role="tablist" class="nav nav-tabs mb-15">
                                    <li role="presentation" class="active">
                                        <a id="alerts-tab" href="#alerts" role="tab" data-toggle="tab" aria-controls="alerts" aria-expanded="true">Alerts</a>
                                    </li>
                                    <li role="presentation">
                                        <a id="messages-tab" href="#messages" role="tab" data-toggle="tab" aria-controls="messages" aria-expanded="false">Messages</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="alerts" role="tabpanel" aria-labelledby="alerts-tab" class="tab-pane fade active in">
                                        Alerts
                                    </div>
                                    <div id="messages" role="tabpanel" aria-labelledby="messages-tab" class="tab-pane fade">
                                        Messages
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
<?php App::ViewPartial('admin-edit-academic-year', 'modals/school'); ?>
<!-- jQuery Counter Up-->
    <script type="text/javascript" src="../plugins/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="../plugins/Counter-Up/jquery.counterup.min.js"></script>
<!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="../plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- Custom Script -->
    <script type="text/javascript" src="../build/js/page-content/dashboard/admin-script.js"></script>
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

        function e(e){
            $(e).block({
                message:"<div class='sk-three-bounce'>"+
                            "<div class='sk-child sk-bounce1'></div>"+
                            "<div class='sk-child sk-bounce2'></div>"+
                            "<div class='sk-child sk-bounce3'></div>"+
                        "</div>",
                css:{border:"none",backgroundColor:"transparent"},
                overlayCSS:{backgroundColor:"#FAFEFF",
                opacity:.5,cursor:"wait"}
            });
        }

        function n(e){$(e).unblock()}

        $(".widget-collapse").on("click",function(){
            $(this).closest(".widget").find(".widget-body").slideToggle(300)
        });

        $(".widget-reload").on("click",function (){
            var o=$(this).closest(".widget");
            e(o),window.setTimeout(function(){n(o)},3e3)
        });

        $(".widget-remove").on("click",function(){$(this).closest(".widget").hide()});

        $(".progress").length>0&&$(".progress .progress-bar").progressbar();
        $(".animated").animo({duration:.2});

        
    </script>