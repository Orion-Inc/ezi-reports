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
                            <li role="presentation" class="hidden">
                                <a id="administration-tab" href="#administration" role="tab" data-toggle="tab" aria-controls="administration" aria-expanded="true">
                                    Administration
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

                            <div id="administration" role="tabpanel" aria-labelledby="administration-tab" class="tab-pane fade in">
                                <div class="row">
                                    
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
<?php App::ViewPartial('student-details','modals/student')?>
<?php App::ViewPartial('add-student','modals/student')?>
<?php //App::ViewPartial('edit-student','modals/student')?>
<!-- DataTables-->
    <script type="text/javascript" src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/jszip/dist/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/pdfmake/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-select/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="../plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript">
    	$('#all-students').DataTable( {
    		ajax:'../includes/actions/student/get-students.php',
		    select:{style:"os"},
		    colReorder:!0,
		    scrollX:!0,
		    scrollCollapse:!0,
		   	fixedHeader:!0,
		   	columnDefs: [
	            {
	            	orderable: false,
	                targets: 8
	            }
	        ]
		});
		$("#all-students_length").append(
			'<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#add-student-info-modal">'+
				'<span class="hidden-xs">Create </span>New<span class="hidden-xs"> Student</span>'+
			'</a>'
		);


    	$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
    </script>

