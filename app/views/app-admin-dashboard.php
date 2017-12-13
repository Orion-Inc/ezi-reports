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
        <div class="col-lg-12">
            <div class="widget clear">
            	<div class="widget-heading clearfix">
                  	<h3 class="widget-title pull-left">Site Traffic</h3>
                  	<ul class="widget-tools pull-right list-inline">
                    	<li><a href="javascript:;" class="widget-collapse"><i class="ti-angle-up"></i></a></li>
                    	<li><a href="javascript:;" class="widget-reload"><i class="ti-reload"></i></a></li>
                  	</ul>
            	</div>
            	<div class="widget-body">
                  	<div class="row">
                    	

                    	<div class="col-md-4">
	                      	<div class="table-responsive">
		                        <table class="table table-hover mt-20">
		                          	<thead>
		                            	<tr>
		                              		<th style="width:10%">#</th>
		                              		<th style="width:40%">Browser</th>
		                              		<th style="width:25%">Sessions</th>
		                            	</tr>
		                          	</thead>
		                          	
		                        </table>
	                      	</div>
                    	</div>
                  	</div>
                </div>
            </div>
        </div>
    </div>

	
</div>
	<!-- Flot Charts--> 
    <!--[if lte IE 8]>
    <script type="text/javascript" src="https://raw.githubusercontent.com/flot/flot/master/excanvas.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="../plugins/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="../plugins/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="../plugins/flot.curvedlines/curvedLines.js"></script>
    <script type="text/javascript" src="../plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

