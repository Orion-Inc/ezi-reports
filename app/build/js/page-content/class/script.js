$(document).ready(function() {
    var lastIdx = null;
    var classesTable =  $('#all-classes').DataTable({
        ajax:'../includes/actions/class/get-classes.php',
        colReorder:true,
        scrollX:true,
        scrollCollapse:true,
        columnDefs: [
            {
                orderable: false,
                targets: 6
            },
            {
                className: 'dt-center', 
                targets: [5,6]
            }
        ],
        order: [[ 2, 'asc' ]],
        lengthMenu: [10, 60, 100, 250, 500],
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'}).data().each(function(group,i){
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr style="background-color: #f9f9f9"><td colspan="7" class="text-semibold" id="student-colspan">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            });

            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function(settings) {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        },
        stateSave: true
    });

/*
    setInterval( function () {
        classesTable.ajax.reload( null, false );  
    }, 50000);
*/
    $("#all-classes_length").append(
        '<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#add-class-modal">'+
            '<span class="hidden-xs">Create </span>New<span class="hidden-xs hidden-sm"> Class</span>'+
        '</a>'
    );

    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    $('#add-class-modal').on('show.bs.modal', function (e) {
        var modal = $(this);
        var school_type = modal.attr('data-school');

        $.ajax({
            url: '../includes/actions/course/fetchSchoolCourses.php',
            dataType:'json',
            type:'POST',
            data:{school_type:school_type},
            success:function(data){
                var options = '<option value="" selected="" disabled="">Select Course</option>';
                $.each(data.array, function(key, val){
                    options += '<option value="'+val.value+'">'+val.name+'</option>';
                });
                modal.find('#class_course').html(options);
            }
        });

        modal.find('#class_name').on('keyup', function (e){
            var class_name = $(this).val();

            if (class_name == "") {
                modal.find("#class_code").val("");
            }
        });

        modal.find('#generateCode').on('click', function (e){
            var class_name = modal.find("#class_name").val();

            if (class_name != "") {
                $.ajax({
                    url: '../includes/actions/class/generateCode.php',
                    dataType:'json',
                    type:'POST',
                    data:{class_name:class_name},
                    success:function(data){
                        modal.find('#class_code').val(data.class_code);
                    }
                });
            } else {
                modal.find("#class_code").val("");
                alert('Enter Class Name!');
            }
        }); 

        modal.find('#class_subjects').select2({
            placeholder: 'Select Class Subjects'
        });

        modal.find('#class_course').on('change', function (e){
            var course = $(this).val();
            var url = "../includes/actions/subject/get-class-subjects.php";

            if (school_type != "basic") {
                url = url+"?school_type=secondary"+"&course_code="+course;
            } else {
                url = url+"?school_type=basic"+"&course_code="+course;
            }

            modal.find('#class_subjects').select2({
                placeholder: 'Select Class Subjects',
                ajax: {
                    url: url,
                    dataType: 'json'
                }
            });
        }); 
    });

    $('#add-class-modal').on('hidden.bs.modal', function (e) {
        var modal = $(this);
        modal.find('form')[0].reset();
    });

    $('#view-class-modal').on('shown.bs.modal', function (e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var button = $(e.relatedTarget);
        var class_code = button.data('class');

        modal.find('.modal-title').html('<i class="ti-blackboard"></i> Class Details');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:{class_code:class_code},
            success:function (data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">'+
                            '<p>'+data.message+'</p>'+
                            '<p><a href="#" data-dismiss="modal">Try Again</a></p>'+
                        '</div>');
                }else{
                    modal.find('.modal-body').html(data.class);
                }
            }
        });
    });

    $('#view-class-subjects-modal').on('shown.bs.modal', function (e) {
        var modal = $(this);
        var url = $(this).attr('data-subjects');
        var button = $(e.relatedTarget);
        var class_code = button.data('class');

        modal.find('.modal-title').html('<i class="ti-blackboard"></i> Class Subjects');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:{class_code:class_code},
            success:function (data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">'+
                            '<p>'+data.message+'</p>'+
                            '<p><a href="#" data-dismiss="modal">Try Again</a></p>'+
                        '</div>');
                }else{
                    modal.find('.modal-body').html(data.subjects);
                }
            }
        });
    });

    $('#edit-class-modal').on('show.bs.modal', function (e) {
        var modal = $(this);
        var school_type = modal.attr('data-school');
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var class_code = button.data('class');
        modal.find('#class_code').val(class_code);

        $.ajax({
            url: '../includes/actions/course/fetchSchoolCourses.php',
            dataType:'json',
            type:'POST',
            data:{school_type:school_type},
            success:function(data){
                var options = '<option value="" selected="" disabled="">Select Course</option>';
                $.each(data.array, function(key, val){
                    options += '<option value="'+val.value+'">'+val.name+'</option>';
                });
                modal.find('#class_course').html(options);
            }
        }); 

        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:{class_code:class_code},
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
                }
            }
        });

        var course = modal.find("#class_course").val();
        var source = "../includes/actions/subject/get-class-subjects.php";

        if (school_type != "basic") {
            source = source+"?school_type=secondary"+"&class_code="+class_code+"&course_code="+course;
        } else {
            source = source+"?school_type=basic"+"&class_code="+class_code+"&course_code="+course;
        }

        modal.find('#class_subjects').select2({
            placeholder: 'Select Class Subjects',
            ajax: {
                url: source,
                dataType: 'json'
            }
        });
    });

    $('#edit-class-modal').on('hidden.bs.modal', function (e) {
        var modal = $(this);
        modal.find('form')[0].reset();
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
});

function deleteClass(class_code,class_name) {
    swal({
        title:"Are you sure?",
        text:"You are about to delete this class\n("+class_name+")",
        type:"warning",
        showCancelButton:!0,
        cancelButtonClass:"btn-default",
        cancelButtonText:"Cancel",
        confirmButtonClass:"btn-danger",
        confirmButtonText:"Delete Class",
        closeOnConfirm:!1
    },function(){
        $.ajax({
            url:'../includes/actions/class/delete-class.php',
            dataType:'json',
            type:'POST',
            data:{class_code:class_code},
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