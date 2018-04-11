$(document).ready(function() {
    $('#edit-school-info-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
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
    $('#edit-school-info-modal').modal('handleUpdate');
    $('#edit-school-info-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateEditSchoolInfoForm.resetForm();
    });

    

    $('#edit-administration-info-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var options = '<option value="" selected="" disabled="">Select Title</option>';

        $.ajax({
            url: '../json/school/school_settings.json',
            dataType: 'json',
            success: function(data) {
                $.each(data.titles, function(key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('.title').html(options);
            }
        });

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
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
    $('#edit-administration-info-modal').modal('handleUpdate');
    $('#edit-administration-info-modal').on('hidden.bs.modal', function(e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateEditSchoolInfoForm.resetForm();
    });

    $('#promote-academic-year-modal').on('show.bs.modal', function(e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            success: function(data) {
                if (data.error != 'false') {
                    toastr.error(data.message, 'Error!');
                } else {
                    var term = ["1st Term", "2nd Term", "3rd Term"];
                    var school_current_academic_year = data.array.school_current_academic_year;
                    var school_current_academic_term = data.array.school_academic_term;
                    var new_academic_year = school_current_academic_year;
                    var new_academic_term = school_current_academic_term;

                    if (school_current_academic_term == term[2]) {
                        var year = school_current_academic_year.toString();
                        var arrayYear = year.split(' - ');

                        new_academic_year = ((parseInt(arrayYear[0]) + 1) + ' - ' + (parseInt(arrayYear[1]) + 1)).toString();
                        new_academic_term = term[0];
                    } else {
                        var i = term.indexOf(school_current_academic_term) + 1;
                        new_academic_term = term[i];
                    }

                    modal.find('#school_academic_term').val(new_academic_term);
                    modal.find('#school_current_academic_year').val(new_academic_year);
                }
            }
        });
    });

    $("#school-crest-form").dropzone({
        paramName: "school_crest",
        maxFilesize: 2,
        maxThumbnailFilesize: 2,
        maxFiles: 1,
        acceptedFiles: "image/*",
        dictDefaultMessage: "<i class='icon-dz ti-image'></i><b>Click</b> or <b>Drop</b> image here to change Crest.",
        init: function() {
            this.on("success", function(e) {
                this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e;
                $('#edit-school-crest-modal').modal('hide');
                var dataUrl = $('#edit-school-crest-modal').attr('dataUrl');
                $('#page-content').load('../views/app-' + dataUrl + '.php?' + dataUrl);
                toastr.success("Crest Changed Successfully!\n<small>Change will take effect next time you log in if it hasn't.</small>", 'Success!');
            })
        }
    });

    $(".signature-form").dropzone({
        paramName: "school_signature",
        maxFilesize: 2,
        maxThumbnailFilesize: 2,
        maxFiles: 1,
        acceptedFiles: "image/*",
        dictDefaultMessage: "<i class='icon-dz ti-image'></i><b>Click</b> or <b>Drop</b> image here to change Signature.",
        init: function() {
            this.on("success", function(e) {
                this.fileTracker && this.removeFile(this.fileTracker), this.fileTracker = e;
                $('.modal').modal('hide');
                var dataUrl = 'school';
                $('#page-content').load('../views/app-' + dataUrl + '.php?' + dataUrl);
                toastr.success('Signature Changed Successfully!', 'Success!');
            })
        }
    });

    var validateEditSchoolInfoForm = $("#school-info").validate({
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

    var validateEditAdministrationForm = $("#school-administration-info").validate({
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

    var validateAccessKeyForm = $("#promote-form").validate({
        highlight: function (r) {
            $(r).closest(".form-group").addClass("has-error")
        },
        unhighlight: function (r) {
            $(r).closest(".form-group").removeClass("has-error")
        },
        errorElement: "span",
        errorClass: "help-block",
        errorPlacement: function (r, e) {
            e.parent(".input-group").length ? r.insertAfter(e.parent()) : e.parent("label").length ? r.insertBefore(e.parent()) : r.insertAfter(e)
        },
        rules: {
            accessKey: {
                remote: {
                    url: "../includes/auth/verify-access-key.php",
                    type: "POST",
                    data: {
                        oldAccessKey: function () {
                            return $("#accessKey").val();
                        }
                    }
                }
            }
        }
    });

    $("#promote-button").on('click', function () {
        $('#confirm-password-modal').modal('show');
        return false;
    });

    $('#confirm-password-modal').on('hidden.bs.modal', function (e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateAccessKeyForm.resetForm();
    });
    
    $("#promote-form").on('submit', function () {
        var isValid = validateAccessKeyForm.valid();
        if (isValid == true) {
            
        }
        return false;
    });

    $(".app-form").on('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');
        var whichForm = form.attr('id');

        if (whichForm == "school-info") {
            var isValid = validateEditSchoolInfoForm.valid();
        } else if (whichForm == "school-academic-year") {
            var isValid = validateEditAcademicYearForm.valid();
        } else if (whichForm == "school-administration-info") {
            var isValid = validateEditAdministrationForm.valid();
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