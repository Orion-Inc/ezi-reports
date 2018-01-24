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

    reset = function() {
        $("#template-download-row").addClass("hidden");
        $('#selected-class-template').prop('selectedIndex', 0);

        toastr.success("CSV File Downloaded. Please fill and upload.", 'Success!');
    }
});