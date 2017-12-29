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
        $totalMalePopulation = '';
        $totalFemalePopulation = '';
        $schools = $totalSchools[0];
        
        $totalStudents = Database::query("SELECT COUNT(`student_code`) FROM `ezi_student`")[0];
        $totalBasicSchools = '';
        $totalSecondarySchools = '';
        $students = $totalStudents[0];

        $schoolPercent = @($schools/$totalSchools[0])*100;
        $studentPercent = @($students/$totalStudents[0])*100;
    ?>
	<div class="row">
        <div class="col-lg-12">
            <div class="widget clear">
            	<div class="widget-heading clearfix">
                  	<h3 class="widget-title pull-left">Overview <small>(Statistics,Site Traffic etc)</small></h3>
                  	<ul class="widget-tools pull-right list-inline">
                    	<li><a href="javascript:;" class="widget-collapse"><i class="ti-angle-up"></i></a></li>
                    	<li><a href="javascript:;" class="widget-reload"><i class="ti-reload"></i></a></li>
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
                                                <div class="fs-12">Basic Schools</div>
                                                <div class="text-primary"><?php echo $totalBasicSchools;?></div>
                                            </div>
                                            <div class="pull-right">
                                                <div class="fs-12">Secondary Schools</div>
                                                <div class="text-primary"><?php echo $totalSecondarySchools;?></div>
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
                                                <div class="fs-12">Male Students</div>
                                                <div class="text-primary"><?php echo $totalMalePopulation;?></div>
                                            </div>
                                            <div class="pull-right">
                                                <div class="fs-12">Female Students</div>
                                                <div class="text-primary"><?php echo $totalFemalePopulation;?></div>
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
		                          	
                                    <?php  ?>
		                        </table>
	                      	</div>
                    	</div>
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