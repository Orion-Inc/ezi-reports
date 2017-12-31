$(document).ready(function() {
    var lastIdx = null;
    var subjectsTable = $('#all-subjects').DataTable({
        ajax: '../includes/actions/subject/admin-fetch-all-subjects.php',
        //select: { style: "os" },
        colReorder: true,
        scrollX: true,
        scrollCollapse: true,
        columnDefs: [{
            className: 'dt-center',
            orderable: false,
            targets: 3
        }],
        order: [
            [2, 'asc']
        ],
        lengthMenu: [10, 60, 100, 250, 500],
        drawCallback: function(settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(2, { page: 'current' }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr style="background-color: #f9f9f9"><td colspan="6" class="text-semibold" id="subject-colspan">' + group + '</td></tr>'
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

    $("#all-subjects_length").append(
        '<a href="#" class="ml-10" data-toggle="modal" data-target="#admin-add-subject-modal">' +
        '<span class="hidden-xs">Add </span>New<span class="hidden-xs hidden-sm"> Subject</span>' +
        '</a>'
    );

    $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');

    $('#admin-add-subject-modal').on('show.bs.modal', function(e) {
        var modal = $(this);

        $.ajax({
            url: '../includes/actions/course/fetchEziCourses.php',
            dataType: 'json',
            type: 'POST',
            data: {},
            success: function(data) {
                var options = '<option value="" disabled="" selected="">Select Course to Assign this Subject</option>';
                $.each(data.array, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#course_code').html(options);
            }
        });

        modal.find('#generateCode').on('click', function(e) {
            var subject_name = modal.find("#subject_name").val();

            if (subject_name != "") {
                $.ajax({
                    url: '../includes/actions/subject/generateCode.php',
                    dataType: 'json',
                    type: 'POST',
                    data: { subject_name: subject_name },
                    success: function(data) {
                        modal.find('#subject_code').val(data.subject_code);
                    }
                });
            } else {
                modal.find("#subject_code").val("");
                alert('Enter Subject Name!');
            }
        });


    });
    $('#admin-add-subject-modal').modal('handleUpdate');
    $('#admin-add-subject-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
    });

    $('#admin-edit-subject-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var subject_code = button.data('subject');
        modal.find('#subject_code').val(subject_code);

        $.ajax({
            url: '../includes/actions/course/fetchEziCourses.php',
            dataType: 'json',
            type: 'POST',
            data: {},
            success: function(data) {
                var options = '<option value="" disabled="" selected="">Select Course to Assign this Subject</option>';
                $.each(data.array, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#course_code').html(options);
            }
        });

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: { subject_code: subject_code },
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
    $('#admin-edit-subject-modal').modal('handleUpdate');
    $('#admin-edit-subject-modal').on('hidden.bs.modal', function(e) {
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

function deleteSubject(subject_code, subject_name) {
    swal({
        title: "Are you sure?",
        text: "You are about to delete this subject's details",
        type: "warning",
        showCancelButton: !0,
        cancelButtonClass: "btn-default",
        cancelButtonText: "Cancel",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Delete Subject",
        closeOnConfirm: !1
    }, function() {
        $.ajax({
            url: '../includes/actions/subject/admin-delete-subject.php',
            dataType: 'json',
            type: 'POST',
            data: { subject_code: subject_code },
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