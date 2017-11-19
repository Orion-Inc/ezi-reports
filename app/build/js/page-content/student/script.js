$(document).ready(function() {		
	var studentsTable =  $('#all-students').DataTable( {
		ajax:'../includes/actions/student/get-students.php',
	    //select:{style:"os"},
	    colReorder:!0,
	    scrollX:!0,
	    scrollCollapse:!0,
	   	fixedHeader:!0,
	   	columnDefs: [
            {
            	width:'12%',
            	orderable: false,
                targets: 8,
            }
        ],
        order: [[ 7, 'asc' ]],
        lengthMenu: [10, 60, 100, 250, 500],
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(7, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class=""><td colspan="10" class="text-semibold" id="class-colspan">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            });

            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function(settings) {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            
        }
	});

    setInterval( function () {
        studentsTable.ajax.reload( null, false );  
    }, 50000);

	$("#class-colspan");

	$("#all-students_length").append(
		'<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#add-student-modal">'+
			'<span class="hidden-xs">Create </span>New<span class="hidden-xs"> Student</span>'+
		'</a>'
	);

	$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

	$("#edit-student").steps({
		headerTag:"h5",
		bodyTag:"fieldset",
		transitionEffect:"slide",
		onFinished: function (event, currentIndex) {
		    var form = $(this);
		    form.submit();
		}
	});

	$("#new-student").steps({
		headerTag:"h5",
		bodyTag:"fieldset",
		transitionEffect:"slide",
		onFinished: function (event, currentIndex) {
		    var form = $(this);
		    form.submit();
		}
	});

	$('#add-student-modal').on('show.bs.modal', function (e) {
        var modal = $(this);
        var school_type = modal.attr('data-school');

        $.ajax({
            url: '../includes/actions/course/fetchSchoolCourses.php',
            dataType:'json',
            type:'POST',
            data:{school_type:school_type},
            success:function(data){
            	var options = '<option value="" selected="" disabled="">Select an Option</option>';
                $.each(data.array, function(key, val){
                    options += '<option value="'+val.value+'">'+val.name+'</option>';
                });
                modal.find('#student_course').html(options);
            }
        });

        $.ajax({
            url: '../includes/actions/class/fetchSchoolClasses.php',
            dataType:'json',
            success:function(data){
            	var options = '<option value="" selected="" disabled="">Select Class</option>';
                $.each(data.array, function(key, val){
                    options += '<option value="' + val.value + '">' + val.name +'</option>';
                });
                modal.find('#student_class').html(options);
            }
        }); 

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

        $.ajax({
            url: '../includes/actions/student/generateCode.php',
            dataType:'json',
            type:'POST',
            success:function(data){
                modal.find('#student_code').val(data.student_code);
            }
        });

        modal.find('#student_course').on('change', function (e){
    		var course_code = $(this).val();

    		$.ajax({
	            url: '../includes/actions/class/fetchSchoolCourseClasses.php',
	            dataType:'json',
	            type:'POST',
	            data:{course_code:course_code},
	            success:function(data){
	            	var options = '<option value="" selected="" disabled="">Select Class</option>';
	                $.each(data.array, function(key, val){
	                    options += '<option value="'+val.value+'">'+val.name+'</option>';
	                });
	                modal.find('#student_class').html(options);
	            }
	        });
    	});  
    });

    $('#view-student-modal').on('shown.bs.modal', function (e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var button = $(e.relatedTarget);
        var student_code = button.data('student');


        modal.find('.modal-title').html('<i class="ti-user"></i> Student Details');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:{student_code:student_code},
            success:function (data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                    	'<div class="fadeIn animated">'+
                    		'<p>'+data.message+'</p>'+
                    		'<p><a href="#" data-dismiss="modal">Try Again</a></p>'+
                    	'</div>');
                }else{
                    modal.find('.modal-body').html(data.student);
                }
            }
        });
    });

    $('#edit-student-modal').on('show.bs.modal', function (e) {
        var modal = $(this);
        var school_type = modal.attr('data-school');
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var student_code = button.data('student');
        modal.find('#student_code').val(student_code);

        $.ajax({
            url: '../includes/actions/class/fetchSchoolClasses.php',
            dataType:'json',
            success:function(data){
            	var options = '<option value="" selected="" disabled="">Select Class</option>';
                $.each(data.array, function(key, val){
                    options += '<option value="' + val.value + '">' + val.name +'</option>';
                });
                modal.find('#student_class').html(options);
            }
        }); 

        $.ajax({
            url: '../includes/actions/course/fetchSchoolCourses.php',
            dataType:'json',
            type:'POST',
            data:{school_type:school_type},
            success:function(data){
            	var options = '<option value="" selected="" disabled="">Select an Option</option>';
                $.each(data.array, function(key, val){
                    options += '<option value="'+val.value+'">'+val.name+'</option>';
                });
                modal.find('#student_course').html(options);
            }
        });

        modal.find('#student_course').on('change', function (e){
    		var course_code = $(this).val();

    		$.ajax({
	            url: '../includes/actions/class/fetchSchoolCourseClasses.php',
	            dataType:'json',
	            type:'POST',
	            data:{course_code:course_code},
	            success:function(data){
	            	var options = '<option value="" selected="" disabled="">Select Class</option>';
	                $.each(data.array, function(key, val){
	                    options += '<option value="'+val.value+'">'+val.name+'</option>';
	                });
	                modal.find('#student_class').html(options);
	            }
	        });
    	});

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
        
        /*var datepicker = modal.find('#student_dob').datepicker({
        	orientation: "bottom auto"
        });*/  
    });

    $('#edit-student-modal').on('shown.bs.modal', function (e) {
        var modal = $(this);
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var student_code = button.data('student');
        modal.find('#student_code').val(student_code);

        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:{student_code:student_code},
            success:function(data){
                if (data.error != 'false') {
                    toastr.error(data.message, 'Error!');
                }else{ 
                    $.each(data.array, function( key, value ) {
                        modal.find('form #'+key).val(value);
                    });

                    $.each(data.array, function( key, value ) {
                        modal.find("form #"+key+" option[value='"+value+"']").prop('selected', true);
                    });

                    $.each(data.array, function( key, value ) {
                        modal.find("form input[name='"+key+"'][value='"+value+"']").prop('checked', true);
                    });
                }
            }
        }); 
    });

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

    $(".app-form-wizard").unbind('submit').bind('submit', function(){
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

    $(".app-student-form-wizard").unbind('submit').bind('submit', function(){
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
                }else{
                    $('.modal').modal('hide');
                    toastr.success(data.message, 'Success!');
                    studentsTable.ajax.reload( null, false ); 
                }
            }
        });
        return false;
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
		$.ajax({
            url:'../includes//actions/student/delete-student.php',
            dataType:'json',
            type:'POST',
            data:{student_code:student_code},
            success:function(data){
                if (data.error != 'false') {
                	swal({title:"Oops!",text:data.message,type:"error",confirmButtonClass:"btn-danger",confirmButtonText:"OK"});
                }else{
                	swal({title:"Deleted!",text:data.message,type:"success",confirmButtonClass:"btn-success",confirmButtonText:"OK"});
                    $('#page-content').load('../views/app-'+data.url+'.php?'+data.url);
                }
            }
        });
	}); 
}