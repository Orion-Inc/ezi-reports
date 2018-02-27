$(document).ready(function() {
    var validateChangeAccessKeyForm = $("#change-access-key").validate({
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
        },
        rules: {
            oldAccessKey: {
                remote: {
                    url: "../includes/auth/verify-access-key.php",
                    type: "POST",
                    data: {
                        oldAccessKey: function() {
                            return $("#oldAccessKey").val();
                        }
                    }
                }
            }
        }
    });

    $(".app-form").on('submit', function() {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');
        var whichForm = form.attr('id');

        if (whichForm == "change-access-key") {
            var isValid = validateChangeAccessKeyForm.valid();
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