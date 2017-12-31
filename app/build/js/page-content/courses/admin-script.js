$(document).ready(function() {
    var lastIdx = null;
    var coursesTable = $('#all-courses').DataTable({
        ajax: '../includes/actions/course/admin-fetch-all-courses.php',
        //select:{style:"os"},
        colReorder: true,
        scrollX: true,
        scrollCollapse: true,
        columnDefs: [{
                className: 'dt-center',
                orderable: false,
                targets: 5
            },
            {
                className: 'dt-center',
                orderable: false,
                targets: [2, 4]
            }
        ],
        order: [
            [3, 'asc']
        ],
        lengthMenu: [10, 60, 100, 250, 500],
        drawCallback: function(settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(3, { page: 'current' }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr style="background-color: #f9f9f9"><td colspan="6" class="text-semibold" id="course-colspan">' + group + '</td></tr>'
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
            schoolsTable.ajax.reload( null, false );  
        }, 50000);
    */

    $("#all-courses_length").append(
        '<a href="#" class="ml-10" data-toggle="modal" data-target="#admin-add-course-modal">' +
        '<span class="hidden-xs">Add </span>New<span class="hidden-xs hidden-sm"> Course</span>' +
        '</a>'
    );

    $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');

    $('#admin-add-course-modal').on('show.bs.modal', function(e) {
        var modal = $(this);

        modal.find('#generateCode').on('click', function(e) {
            var course_name = modal.find("#course_name").val();

            if (course_name != "") {
                $.ajax({
                    url: '../includes/actions/course/generateCode.php',
                    dataType: 'json',
                    type: 'POST',
                    data: { course_name: course_name },
                    success: function(data) {
                        modal.find('#course_code').val(data.course_code);
                    }
                });
            } else {
                modal.find("#course_code").val("");
                alert('Enter Course Name!');
            }
        });
    });
    $('#admin-add-course-modal').modal('handleUpdate');
    $('#admin-add-course-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
    });

    $('#admin-view-course-modal').on('shown.bs.modal', function(e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var button = $(e.relatedTarget);
        var course_code = button.data('course');

        modal.find('.modal-title').html('<i class="ti-book"></i> View Course');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: { course_code: course_code },
            success: function(data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">' +
                        '<p>' + data.message + '</p>' +
                        '<p><a href="#" data-dismiss="modal">Try Again</a></p>' +
                        '</div>');
                } else {
                    modal.find('.modal-body').html(data.course);
                }
            }
        });
    });

    $('#admin-edit-course-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var course_code = button.data('course');
        modal.find('#course_code').val(course_code);

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: { course_code: course_code },
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
                }
            }
        });
    });
    $('#admin-edit-course-modal').modal('handleUpdate');
    $('#admin-edit-course-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
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
});

function deleteCourse(course_code, course_name) {
    swal({
        title: "Are you sure?",
        text: "You are about to delete this course's details",
        type: "warning",
        showCancelButton: !0,
        cancelButtonClass: "btn-default",
        cancelButtonText: "Cancel",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Delete Course",
        closeOnConfirm: !1
    }, function() {
        $.ajax({
            url: '../includes/actions/course/admin-delete-course.php',
            dataType: 'json',
            type: 'POST',
            data: { course_code: course_code },
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