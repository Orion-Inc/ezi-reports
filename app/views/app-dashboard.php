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
       	<div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Students</h5>
                  	<div class="fs-36 fw-600 mb-20 counter" id="total-students">0</div>
                  	<div data-percent="0" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-user text-muted"></i>
                  	</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">Total Classrooms</h5>
                  	<div class="fs-36 fw-600 mb-20 counter" id="total-classrooms"></div>
                  	<div data-percent="0" class="easy-pie-chart fs-36 bar-track">
                  		<i class="ti-blackboard text-muted"></i>
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

	$.ajax({
        url: '../includes/actions/dashboard/charts.php',
        dataType:'json',
        success:function(data){
        	$.each(data.count, function( key, value ) {
                $("#"+key).text(value);
            });

        	$.each(data.pieChart, function( key, value ) {
                $("#"+key).find(".easy-pie-chart").attr('data-percent', value);
            });
        }
    });

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