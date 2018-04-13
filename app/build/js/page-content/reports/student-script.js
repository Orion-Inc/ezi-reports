$(document).ready(function () {
    var options = '<option value="" selected="" disabled="">Select Term</option>';

    $.ajax({
        url: '../json/school/school_settings.json',
        dataType: 'json',
        success: function (data) {
            $.each(data.term, function (key, val) {
                options += '<option value="' + val.value + '">' + val.name + '</option>';
            });
            $('#selected-term-query').html(options);
        }
    });

    $("#select-class-query").on('click', function () {
        var selectedClass = $("#selected-class-query").val();
        var selectedYear = $("#selected-year-query").val();
        var selectedTerm = $("#selected-term-query").val();
        var studentCode = $("#student-code").val();

        if (selectedClass == null || selectedYear == null || selectedTerm == null) {
            alert("Please Select an Option!");
        } else {
            $('#selected-class-query, #selected-year-query, #selected-term-query').prop('selectedIndex', 0);
            $("#query-class-row").addClass('hidden');
            $("#query-report-row").removeClass('hidden');
            $("#query-report-row").html('<div class="text-center"><img src="../assets/images/loading.gif" width="60px" height="60px"/></div>');

            $.ajax({
                url: '../includes/actions/report/fetch-class-report.php',
                dataType: 'json',
                type: 'GET',
                data: { type: '_getStudentReport', student_code : studentCode,class_code: selectedClass, academic_term: selectedTerm, academic_year: selectedYear },
                success: function (data) {
                    if (data.error != 'false') {
                        swal(
                            'Oops!',
                            data.message,
                            'error'
                        );
                        $("#query-report-row").addClass('hidden');
                        $("#query-report-row").html('');
                        $("#query-class-row").removeClass('hidden');
                    } else {
                        $("#query-report-row").html(data.page);
                    }
                }
            });

        }
    });

    goback = function(){
        $("#query-report-row").addClass('hidden');
        $("#query-report-row").html('');
        $("#query-class-row").removeClass('hidden');
    }

    end = function () {
        
    }

    downloadReport = function (student_code, academic_year,academic_term) {
        alert();
        $.AjaxDownloader({
            url: "../includes/actions/report/download-report.php",
            data: {
                student_code: student_code,
                academic_year: academic_year,
                academic_term: academic_term
            },
            success: end()
        });
    }

});