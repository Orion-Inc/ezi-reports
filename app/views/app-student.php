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
                            <li role="presentation" class="">
                                <a id="classes-tab" href="#classes" role="tab" data-toggle="tab" aria-controls="classes" aria-expanded="true">
                                    Class
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

                            <div id="classes" role="tabpanel" aria-labelledby="classes-tab" class="tab-pane fade in">
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
<?php App::ViewPartial('view-student','modals/student')?>
<?php App::ViewPartial('add-student','modals/student')?>
<?php App::ViewPartial('edit-student','modals/student')?>
	<!-- Bootstrap File Input-->
    <script type="text/javascript" src="../plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script type="text/javascript">
    	$('#all-students').DataTable( {
    		ajax:'../includes/actions/student/get-students.php',
		    //select:{style:"os"},
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
			'<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#add-student-modal">'+
				'<span class="hidden-xs">Create </span>New<span class="hidden-xs"> Student</span>'+
			'</a>'
		);


    	$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

    	$("#edit-student").steps({headerTag:"h5",bodyTag:"fieldset",transitionEffect:"slide"});
    	$("#new-student").steps({headerTag:"h5",bodyTag:"fieldset",transitionEffect:"slide"});

    	$('#add-student-modal').on('show.bs.modal', function (e) {
	        var modal = $(this);
	        var school = modal.attr('data-school');

	        $.ajax({
	            url: '../json/student/student_settings.json',
	            dataType:'json',
	            success:function(data){
	            	var options = '<option value="" selected="" disabled="">Select an Option</option>';
	                $.each(data.relationship, function(key, val){
	                    options += '<option value="'+val.value+'">'+val.name+'</option>';
	                });
	                modal.find('#guardian_relationship').html(options);
	            }
	        });

	        switch(school){
	        	case 'secondary':
	        		$.ajax({
			            url: '../json/school/courses.json',
			            dataType:'json',
			            success:function(data){
			            	var options = '<option value="" selected="" disabled="">Select Course</option>';
			                $.each(data.secondary, function(key, val){//Change data.{school_type} depending on school type
			                    options += '<option value="' + val.value + '">' + val.name +'</option>';
			                });
			                modal.find('#student_course').html(options);
			            }
			        });
	        		break;

	        	case 'basic':
	        		$.ajax({
			            url: '../json/school/courses.json',
			            dataType:'json',
			            success:function(data){
			            	var options = '<option value="" selected="" disabled="">Select Course</option>';
			                $.each(data.basic, function(key, val){//Change data.{school_type} depending on school type
			                    options += '<option value="' + val.value + '">' + val.name +'</option>';
			                });
			                modal.find('#student_course').html(options);
			            }
			        });	
	        		break;
	        }     
	    });

    	$('#add-student-modal').on('shown.bs.modal', function (e) {
	        var modal = $(this);
	        
	        var datepicker = modal.find('#student_dob').datepicker({
	        	orientation: "bottom auto"
	        });
	    });

	    $('#view-student-modal').on('shown.bs.modal', function (event) {
            var modal = $(this);
            var url = $(this).attr('data-fetch');
            modal.find('.modal-title').html('<i class="ti-user"></i> Student Details');
            modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
            $.ajax({
                url:url,
                type:'POST',
                data:{},
                success:function (data) {
                    
                }
            });
        });

        $('#edit-student-modal').on('show.bs.modal', function (e) {
	        var modal = $(this);
	        var school = modal.attr('data-school');
	        var student_code = '';

	        modal.find('#student_code').val(student_code);

	        $.ajax({
	            url: '../json/student/student_settings.json',
	            dataType:'json',
	            success:function(data){
	            	var options = '<option value="" selected="" disabled="">Select an Option</option>';
	                $.each(data.relationship, function(key, val){
	                    options += '<option value="'+val.value+'">'+val.name+'</option>';
	                });
	                modal.find('#guardian_relationship').html(options);
	            }
	        });

	        switch(school){
	        	case 'secondary':
	        		$.ajax({
			            url: '../json/school/courses.json',
			            dataType:'json',
			            success:function(data){
			            	var options = '<option value="" selected="" disabled="">Select Course</option>';
			                $.each(data.secondary, function(key, val){//Change data.{school_type} depending on school type
			                    options += '<option value="' + val.value + '">' + val.name +'</option>';
			                });
			                modal.find('#student_course').html(options);
			            }
			        });
	        		break;

	        	case 'basic':
	        		$.ajax({
			            url: '../json/school/courses.json',
			            dataType:'json',
			            success:function(data){
			            	var options = '<option value="" selected="" disabled="">Select Course</option>';
			                $.each(data.basic, function(key, val){//Change data.{school_type} depending on school type
			                    options += '<option value="' + val.value + '">' + val.name +'</option>';
			                });
			                modal.find('#student_course').html(options);
			            }
			        });	
	        		break;
	        }     
	    });

	    $('#edit-student-modal').on('shown.bs.modal', function (e) {
	        var modal = $(this);
	        var url = $(this).attr('data-fetch');
	        
	        var datepicker = modal.find('#student_dob').datepicker({
	        	orientation: "bottom auto"
	        });

	        $.ajax({
	            url:url,
	            dataType:'json',
	            type:'POST',
	            success:function(data){
	                if (data.error != 'false') {
	                    toastr.error(data.message, 'Error!');
	                }else{ 
	                    
	                }
	            }
	        });
	    });

	    function deleteStudent(student_code,student_name) {
	    	swal({
	    		title:"Are you sure?",
	    		text:"You are about to delete "+student_name+"'s details",
	    		type:"warning",
	    		showCancelButton:!0,
	    		cancelButtonClass:"btn-default",
	    		cancelButtonText:"Cancel",
	    		confirmButtonClass:"btn-danger",
	    		confirmButtonText:"Delete Student",
	    		closeOnConfirm:!1
	    	},function(){
	    		
	    	}); 
	    }


    	$(".app-form").unbind('submit').bind('submit', function(){
	        var form = $(this);
	        var data = form.serialize();
	        var url = form.attr('action');

	        $.ajax({
	            url:url,
	            dataType:'json',
	            type:'POST',
	            data:data,
	            success:function(data){
	                if (data.error != 'false') {
	                    $('.modal').modal('hide');
	                    toastr.error(data.message, 'Error!');
	                    $('#page-content').load('../views/app-'+data.url+'.php?'+data.url);
	                }else{
	                    $('.modal').modal('hide');
	                    toastr.success(data.message, 'Success!');
	                    $('#page-content').load('../views/app-'+data.url+'.php?'+data.url);
	                }
	            }
	        });
	        return false;
	    });
    </script>

