$(document).ready(function() {
    var schoolsTable = $('#all-schools').DataTable({
        ajax: '../includes/actions/school/admin-fetch-all-schools.php',
        //select:{style:"os"},
        colReorder: true,
        scrollX: true,
        scrollCollapse: true,
        columnDefs: [{
                className: 'dt-center',
                orderable: false,
                targets: 7
            },
            {
                className: 'dt-center',
                orderable: false,
                targets: 2
            }
        ],
        order: [
            [1, 'asc']
        ],
        lengthMenu: [10, 60, 100, 250, 500],
        stateSave: true
    });
    /*
        setInterval( function () {
            schoolsTable.ajax.reload( null, false );  
        }, 50000);
    */

    $("#all-schools_length").append(
        '<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#admin-add-school-modal">' +
        '<span class="hidden-xs">Add </span>New<span class="hidden-xs hidden-sm"> School</span>' +
        '</a>'
    );

    $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');

    $('#admin-add-school-modal').on('show.bs.modal', function(e) {
        var modal = $(this);

        modal.find('#generateCode').on('click', function(e) {
            var school_name = modal.find("#school_name").val();

            if (school_name != "") {
                $.ajax({
                    url: '../includes/actions/school/generateCode.php',
                    dataType: 'json',
                    type: 'GET',
                    data: { school_name: school_name },
                    success: function(data) {
                        modal.find('#school_code').val(data.school_code);
                    }
                });
            } else {
                modal.find("#school_code").val("");
                alert('Enter School Name!');
            }
        });
    });
    $('#admin-add-school-modal').modal('handleUpdate');
    $('#admin-add-school-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateAddForm.resetForm();
    });

    $('#admin-view-school-modal').on('shown.bs.modal', function(e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var button = $(e.relatedTarget);
        var school_code = button.data('school');

        modal.find('.modal-title').html('<i class="ti-user"></i> School Details');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            data: { school_code: school_code },
            success: function(data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">' +
                        '<p>' + data.message + '</p>' +
                        '<p><a href="#" data-dismiss="modal">Try Again</a></p>' +
                        '</div>');
                } else {
                    modal.find('.modal-body').html(data.school);
                }
            }
        });
    });

    $('#admin-edit-school-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var url = modal.attr('data-fetch');

        var button = $(e.relatedTarget);
        var school_code = button.data('school');
        modal.find('#school_code').val(school_code);

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            data: { school_code: school_code },
            success: function(data) {
                if (data.error != 'false') {
                    toastr.error(data.message, 'Error!');
                } else {
                    $.each(data.array, function(key, value) {
                        modal.find('form #' + key).val(value);
                    });
                }
            }
        });
    });
    $('#admin-edit-school-modal').modal('handleUpdate');
    $('#admin-edit-school-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateEditForm.resetForm();
    });


    $('#admin-edit-school-crest-modal').on('show.bs.modal', function(e) {
        var modal = $(this);

        var button = $(e.relatedTarget);
        var school_code = button.data('school');

        var url = "../includes/actions/school/admin-edit-school-crest.php?school_code=" + school_code;

        modal.find("#school-crest-form").dropzone({
            paramName: "school_crest",
            maxFilesize: 2,
            maxThumbnailFilesize: 2,
            maxFiles: 1,
            acceptedFiles: "image/*",
            dictDefaultMessage: "<i class='icon-dz ti-image'></i><b>Click</b> or <b>Drop</b> image here to change Crest.",
            url: url,
            init: function() {
                this.on("success", function(e) {
                    this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e;
                    modal.modal('hide');
                    var dataUrl = modal.attr('dataUrl');
                    $('#page-content').load('../views/app-' + dataUrl + '.php?' + dataUrl);
                    toastr.success("School Crest Changed Successfully!", 'Success!');
                })
            }
        });
    });

    $('#admin-view-school-crest-modal').on('show.bs.modal', function(e) {
        var modal = $(this);

        var button = $(e.relatedTarget);
        var school_code = button.data('school');


        $.ajax({
            url: '../includes/actions/school/admin-view-school-crest.php',
            dataType: 'json',
            type: 'GET',
            data: { school_code: school_code },
            success: function(data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">' +
                        '<p>' + data.message + '</p>' +
                        '<p><a href="#" data-dismiss="modal">Try Again</a></p>' +
                        '</div>');
                } else {
                    modal.find('.modal-body').html(data.school_crest);
                }
            }
        });
    });

    var validateAddForm = $("#add-school").validate({
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

    var validateEditForm = $("#edit-school").validate({
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

    $(".app-form").on('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');
        var whichForm = form.attr('id');

        if (whichForm == "add-school") {
            var isValid = validateAddForm.valid();
        } else if (whichForm == "edit-school") {
            var isValid = validateEditForm.valid();
        }
        if (isValid == true) {
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
        }
        return false;
    });
});

function deleteSchool(school_code, school_name) {
    swal({
        title: "Are you sure?",
        text: "You are about to delete this school's details",
        type: "warning",
        showCancelButton: !0,
        cancelButtonClass: "btn-default",
        cancelButtonText: "Cancel",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Delete School",
        closeOnConfirm: !1
    }, function() {
        $.ajax({
            url: '../includes/actions/school/admin-delete-school.php',
            dataType: 'json',
            type: 'POST',
            data: { school_code: school_code },
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