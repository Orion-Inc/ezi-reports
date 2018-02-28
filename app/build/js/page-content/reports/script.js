$(document).ready(function() {
    $("#select-class-upload").on('click', function() {
        var selectedClass = $("#selected-class-upload").val();

        if (selectedClass == null) {
            alert("Please Select a Class First!");
        } else {
            $("#new-report-upload-bulk").find("#class-code").val(selectedClass);
            $('#selected-class-upload').prop('selectedIndex', 0);
            $("#select-class-row").addClass('hidden');
            $("#upload-report-row").removeClass('hidden');
        }
    });

    $("#cancel-upload").on('click', function() {
        $("#upload-report-row").addClass('hidden');
        $("#select-class-row").removeClass('hidden');
    });

    $("#select-class-query").on('click', function() {
        var selectedClass = $("#selected-class-query").val();

        if (selectedClass == null) {
            alert("Please Select a Class First!");
        } else {
            $('#selected-class-query').prop('selectedIndex', 0);
            $("#query-class-row").addClass('hidden');
            $("#query-report-row").removeClass('hidden');

            $.ajax({
                url: '../includes/actions/report/fetch-class-report.php',
                dataType: 'json',
                type: 'GET',
                data: { class_code: selectedClass },
                success: function(data) {
                    if (data.error != 'false') {
                        toastr.error(data.message, 'Error!');
                    } else {
                        $("#query-report-row").html(data.page);
                    }
                }
            });

        }
    });


    $("#select-class-template").on('click', function() {
        var classCode = $("#selected-class-template").val();

        if (classCode == null) {
            alert("Please Select a Class First!");
        } else {
            $("#template-download-row").removeClass("hidden");
            $.AjaxDownloader({
                url: "../includes/actions/report/download-report-template.php",
                data: {
                    class_code: classCode
                },
                success: reset()
            });
        }
    });

    $("#new-report-upload-bulk").on('submit', function () {
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');
        var modal = $('#upload-report-progress-modal');

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: new FormData(form[0]),
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.modal').modal('hide');
                modal.modal('show');
            },
            progress: function () {
                modal.find('.modal-body').html(
                    '<p>Please Wait...(<span id="current">0</span> out of <span id="total">0</span>)</p>' +
                    '<div class="progress progress-striped progress-sm active hidden">' +
                    '<div role="progressbar" data-transitiongoal="25" class="progress-bar progress-bar-striped"></div>' +
                    '</div>'
                );
            },
            success: function (data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html('<p>' + data.message + '</p>');
                } else {
                    if (data.current != data.total) {
                        modal.find('.modal-body').find('#current').html(data.current);
                        modal.find('.modal-body').find('#total').html(data.total);
                    } else {
                        modal.find('.modal-body').html(
                            '<p>Upload Completed Successfully!' +
                            '<p><span id="current">' + data.current + '</span> out of <span id="total">' + data.total + '</span></p>' +
                            '<p><a href="javascript:page(\'reports\')" data-dismiss="modal" aria-label="Close">Continue.</a></p>'
                        );
                    }
                }
            }
        });
        return false;
    });
    

    reset = function() {
        $("#template-download-row").addClass("hidden");
        $('#selected-class-template').prop('selectedIndex', 0);

        toastr.success("CSV File Downloaded. Please fill and upload.", 'Success!');
    }
});