$(document).ready(function() {
    var studentsTable = $('#all-students').DataTable({
        ajax: '../includes/actions/student/get-students.php',
        //select:{style:"os"},
        colReorder: true,
        scrollX: true,
        scrollCollapse: true,
        columnDefs: [{
                width: "15%",
                orderable: false,
                targets: 8
            },
            {
                className: 'dt-center',
                targets: 8
            }
        ],
        order: [
            [7, 'asc']
        ],
        lengthMenu: [10, 60, 100, 250, 500],
        drawCallback: function(settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(7, { page: 'current' }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr style="background-color: #f9f9f9"><td colspan="10" class="text-semibold" id="student-colspan">' + group + '</td></tr>'
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
            studentsTable.ajax.reload( null, false );  
        }, 50000);
    */

    $("#all-students_length").append(
        '<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#add-student-modal">' +
        '<span class="hidden-xs">Create </span>New<span class="hidden-xs hidden-sm"> Student</span>' +
        '</a>'
    );

    $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');



    var validateEditForm = $("#edit-student").steps({
        headerTag: "h5",
        bodyTag: "fieldset",
        transitionEffect: "slide",
        cssClass: 'wizard step-equal-width',
        onStepChanging: function(event, currentIndex, newIndex) {
            var form = $(this);
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            var form = $(this);
            form.submit();
        }
    }).validate({
        highlight: function(r) {
            $(r).closest(".form-group").addClass("has-error")
        },
        unhighlight: function(r) {
            $(r).closest(".form-group").removeClass("has-error")
        },
        errorElement: "span",
        errorClass: "help-block",
        errorPlacement: function(r, e) {
            e.parent(".input-group").length ? r.insertAfter(e.parent()) : e.parent("label").length ? r.insertBefore(e.parent()) : r.insertAfter(e)
        }
    });

    var validateAddForm = $("#new-student").steps({
        headerTag: "h5",
        bodyTag: "fieldset",
        transitionEffect: "slide",
        cssClass: 'wizard step-equal-width',
        onStepChanging: function(event, currentIndex, newIndex) {
            var form = $(this);
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            var form = $(this);
            form.submit();
        }
    }).validate({
        highlight: function(r) {
            $(r).closest(".form-group").addClass("has-error")
        },
        unhighlight: function(r) {
            $(r).closest(".form-group").removeClass("has-error")
        },
        errorElement: "span",
        errorClass: "help-block",
        errorPlacement: function(r, e) {
            e.parent(".input-group").length ? r.insertAfter(e.parent()) : e.parent("label").length ? r.insertBefore(e.parent()) : r.insertAfter(e)
        }
    });

    $('#add-student-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var school_type = modal.attr('data-school');

        $.ajax({
            url: '../includes/actions/course/fetchSchoolCourses.php',
            dataType: 'json',
            type: 'GET',
            data: { school_type: school_type },
            success: function(data) {
                var options = '<option value="" selected="" disabled="">Select an Option</option>';
                $.each(data.array, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#student_course').html(options);
            }
        });

        $.ajax({
            url: '../json/student/student_settings.json',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" selected="" disabled="">Select an Option</option>';
                $.each(data.relationship, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#guardian_relationship').html(options);
            }
        });

        modal.find('#student_name').on('keyup', function(e) {
            var student_name = $(this).val();

            if (student_name == "") {
                modal.find("#student_code").val("");
            }
        });

        modal.find('#generateCode').on('click', function(e) {
            var student_name = modal.find("#student_name").val();

            if (student_name != "") {
                $.ajax({
                    url: '../includes/actions/student/generateCode.php',
                    dataType: 'json',
                    type: 'GET',
                    data: { student_name: student_name },
                    success: function(data) {
                        modal.find('#student_code').val(data.student_code);
                    }
                });
            } else {
                modal.find("#student_code").val("");
                alert('Enter Student Name!');
            }
        });

        modal.find('#student_course').on('change', function(e) {
            var course_code = $(this).val();

            $.ajax({
                url: '../includes/actions/class/fetchSchoolCourseClasses.php',
                dataType: 'json',
                type: 'GET',
                data: { course_code: course_code },
                success: function(data) {
                    var options = '<option value="" selected="" disabled="">Select a Class</option>';
                    $.each(data.array, function(key, val) {
                        options += '<option value="' + val.value + '">' + val.name + '</option>';
                    });
                    modal.find('#student_class').html(options);
                }
            });
        });
        modal.find('input[name="student_status"]').on('change', function(e) {
            var student_status = $(this).val();
            switch (student_status) {
                case "day":
                    modal.find('#student_house').removeAttr("data-rule-required");
                    break;
                case "boarding":
                    modal.find('#student_house').attr("data-rule-required", "true");
                    break;
            }
        });
    });
    $('#add-student-modal').modal('handleUpdate');
    $('#add-student-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateAddForm.resetForm();
    });

    $('#view-student-modal').on('shown.bs.modal', function(e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var button = $(e.relatedTarget);
        var student_code = button.data('student');


        modal.find('.modal-title').html('<i class="ti-user"></i> Student Details');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            data: { student_code: student_code },
            success: function(data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">' +
                        '<p>' + data.message + '</p>' +
                        '<p><a href="#" data-dismiss="modal">Try Again</a></p>' +
                        '</div>');
                } else {
                    modal.find('.modal-body').html(data.student);
                }
            }
        });
    });

    $('#edit-student-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var school_type = modal.attr('data-school');
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var student_code = button.data('student');
        modal.find('#student_code').val(student_code);

        $.ajax({
            url: '../includes/actions/class/fetchSchoolClasses.php',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" selected="" disabled="">Select Class</option>';
                $.each(data.array, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#student_class').html(options);
            }
        });

        $.ajax({
            url: '../includes/actions/course/fetchSchoolCourses.php',
            dataType: 'json',
            type: 'GET',
            data: { school_type: school_type },
            success: function(data) {
                var options = '<option value="" selected="" disabled="">Select an Option</option>';
                $.each(data.array, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#student_course').html(options);
            }
        });

        modal.find('#student_course').on('change', function(e) {
            var course_code = $(this).val();

            $.ajax({
                url: '../includes/actions/class/fetchSchoolCourseClasses.php',
                dataType: 'json',
                type: 'GET',
                data: { course_code: course_code },
                success: function(data) {
                    var options = '<option value="" selected="" disabled="">Select Class</option>';
                    $.each(data.array, function(key, val) {
                        options += '<option value="' + val.value + '">' + val.name + '</option>';
                    });
                    modal.find('#student_class').html(options);
                }
            });
        });

        $.ajax({
            url: '../json/student/student_settings.json',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" selected="" disabled="">Select an Option</option>';
                $.each(data.relationship, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#guardian_relationship').html(options);
            }
        });

        /*var datepicker = modal.find('#student_dob').datepicker({
        	orientation: "bottom auto"
        });*/

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            data: { student_code: student_code },
            success: function(data) {
                if (data.error != 'false') {
                    toastr.error(data.message, 'Error!');
                } else {
                    $.each(data.array, function(key, value) {
                        modal.find('form #' + key).val(value);
                    });

                    $.each(data.array, function(key, value) {
                        modal.find("form #" + key + " option[value='" + value + "']").prop('selected', true);
                    });

                    $.each(data.array, function(key, value) {
                        modal.find("form input[name='" + key + "'][value='" + value + "']").prop('checked', true);
                    });
                }
            }
        });
        modal.find('input[name="student_status"]').on('change', function(e) {
            var student_status = $(this).val();
            switch (student_status) {
                case "day":
                    modal.find('#student_house').removeAttr("data-rule-required");
                    break;
                case "boarding":
                    modal.find('#student_house').attr("data-rule-required", "true");
                    break;
            }
        });
    });
    $('#edit-student-modal').modal('handleUpdate');
    $('#edit-student-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateEditForm.resetForm();
    });

    $(".app-form").unbind('submit').bind('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: data,
            success: function(data) {
                if (data.error != 'false') {
                    $('.modal').modal('hide');
                    toastr.error(data.message, 'Error!');
                    $('#page-content').load('../views/app-' + data.url + '.php?' + data.url);
                } else {
                    $('.modal').modal('hide');
                    toastr.success(data.message, 'Success!');
                    $('#page-content').load('../views/app-' + data.url + '.php?' + data.url);
                }
            }
        });
        return false;
    });

    $(".app-form-wizard").unbind('submit').bind('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: data,
            success: function(data) {
                if (data.error != 'false') {
                    $('.modal').modal('hide');
                    toastr.error(data.message, 'Error!');
                    $('#page-content').load('../views/app-' + data.url + '.php?' + data.url);
                } else {
                    $('.modal').modal('hide');
                    toastr.success(data.message, 'Success!');
                    $('#page-content').load('../views/app-' + data.url + '.php?' + data.url);
                }
            }
        });
        return false;
    });

    $(".app-student-form-wizard").unbind('submit').bind('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: data,
            success: function(data) {
                if (data.error != 'false') {
                    $('.modal').modal('hide');
                    toastr.error(data.message, 'Error!');
                } else {
                    $('.modal').modal('hide');
                    toastr.success(data.message, 'Success!');
                    $('#page-content').load('../views/app-' + data.url + '.php?' + data.url);
                }
            }
        });
        return false;
    });

    $("#new-student-bulk").unbind('submit').bind('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');
        var modal = $('#add-student-progress-modal');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: new FormData(form[0]),
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('.modal').modal('hide');
                modal.modal('show');
            },
            progress: function() {
                modal.find('.modal-body').html(
                    '<p>Please Wait...(<span id="current">0</span> out of <span id="total">0</span>)</p>' +
                    '<div class="progress progress-striped progress-sm active hidden">' +
                    '<div role="progressbar" data-transitiongoal="25" class="progress-bar progress-bar-striped"></div>' +
                    '</div>'
                );
            },
            success: function(data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html('<p>' + data.message + '</p>');
                } else {
                    if (data.current != data.total) {
                        modal.find('.modal-body').find('#current').html(data.current);
                        modal.find('.modal-body').find('#total').html(data.total);
                    } else {
                        modal.find('.modal-body').html(
                            '<p>Creation Completed Successfully!' +
                            '<p><span id="current">' + data.current + '</span> out of <span id="total">' + data.total + '</span></p>' +
                            '<p><a href="javascript:page(\'student\')" data-dismiss="modal">Continue.</a></p>'
                        );
                    }
                }
            }
        });
        return false;
    });

    $('#add-student-progress-modal').on('hidden.bs.modal', function(e) {
        studentsTable.ajax.reload(null, false);
    });
});

function deleteStudent(student_code, student_name) {
    swal({
        title: "Are you sure?",
        text: "You are about to delete " + student_name + "'s details",
        type: "warning",
        showCancelButton: !0,
        cancelButtonClass: "btn-default",
        cancelButtonText: "Cancel",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Delete Student",
        closeOnConfirm: !1
    }, function() {
        $.ajax({
            url: '../includes/actions/student/delete-student.php',
            dataType: 'json',
            type: 'POST',
            data: { student_code: student_code },
            success: function(data) {
                if (data.error != 'false') {
                    swal({ title: "Oops!", text: data.message, type: "error", confirmButtonClass: "btn-danger", confirmButtonText: "OK" });
                } else {
                    swal({ title: "Deleted!", text: data.message, type: "success", confirmButtonClass: "btn-success", confirmButtonText: "OK" });
                    $('#page-content').load('../views/app-' + data.url + '.php?' + data.url);
                }
            }
        });
    });
}