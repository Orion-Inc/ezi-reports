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

});