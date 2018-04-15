$(document).ready(function () {
    /**
     * Edit Code below
     */
    $('#edit-academic-year-modal').on('show.bs.modal', function (e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');

        var options = '<option value="" selected="" disabled="">Select Current Term</option>';

        $.ajax({
            url: '../json/school/school_settings.json',
            dataType: 'json',
            success: function (data) {
                $.each(data.term, function (key, val) {
                    options += '<option value="' + val.value + '">' + val.name + '</option>';
                });
                modal.find('#academic_term').html(options);
            }
        });

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            success: function (data) {
                if (data.error != 'false') {
                    toastr.error(data.message, 'Error!');
                } else {
                    modal.find('#current_academic_year').val(data.array.current_academic_year);
                    modal.find("#academic_term option[value='" + data.array.academic_term + "']").prop('selected', true);

                    var school_current_academic_year = modal.find('#current_academic_year').val();
                    var year = school_current_academic_year.toString();
                    var arrayYear = year.split(' - ');

                    modal.find('#term_from').val(arrayYear[0]);
                    modal.find('#term_to').val(arrayYear[1]);
                }
            }
        });
    });
    $('#edit-academic-year-modal').on('shown.bs.modal', function (e) {
        var modal = $(this);

        $('#term_from, #term_to').on('keyup', function () {
            var academic_year = modal.find('#term_from').val() + ' - ' + modal.find('#term_to').val();
            modal.find('#current_academic_year').val(academic_year);
        });


    });
    $('#edit-academic-year-modal').modal('handleUpdate');
    $('#edit-academic-year-modal').on('hidden.bs.modal', function (e) {
        var modal = $(this);
        modal.find('form')[0].reset();
        modal.find('form .form-group').removeClass("has-error");
        validateEditAcademicYearForm.resetForm();
    });

    var validateEditAcademicYearForm = $("#school-academic-year").validate({
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
        }
    });

    $(".app-form").on('submit', function () {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');

        var isValid = validateEditAcademicYearForm.valid();
        
        if (isValid == true) {
            $.ajax({
                url: url,
                dataType: 'json',
                type: 'POST',
                data: data,
                success: function (data) {
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