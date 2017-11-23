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
                  	<h5 class="mb-5">New Comments</h5>
                  	<div class="fs-36 fw-600 mb-20 counter">1,206</div>
                  	<div id="esp-comment" data-percent="75" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-comment-alt text-muted"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">New Comments</h5>
                  	<div class="fs-36 fw-600 mb-20 counter">1,206</div>
                  	<div id="esp-comment" data-percent="75" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-comment-alt text-muted"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">New Comments</h5>
                  	<div class="fs-36 fw-600 mb-20 counter">1,206</div>
                  	<div id="esp-comment" data-percent="75" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-comment-alt text-muted"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget text-center">
                <div class="widget-body">
                  	<h5 class="mb-5">New Comments</h5>
                  	<div class="fs-36 fw-600 mb-20 counter">1,206</div>
                  	<div id="esp-comment" data-percent="75" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-comment-alt text-muted"></i></div>
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
	$("#esp-comment").easyPieChart({
		barColor:"#8E23E0",
		trackColor:"#E6E6E6",
		scaleColor:!1,
		scaleLength:0,
		lineCap:"round",
		lineWidth:10,
		size:140,
		animate:{duration:2e3,enabled:!0}
	})
</script>