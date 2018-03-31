<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();
    $data = $_POST;

    try {
        $report_array = Database::query("SELECT `class_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `terminal_report_code` = '{$data['report_id']}'")[0];
        if(empty($report_array)){
            $response = array('error' => 'true', 'url' => 'reports', 'message' => "An error occured! Try again or Contact Us.");
            exit();
        }

        $student_results = explode(',', $report_array['terminal_report_grades']);

        $fields = "";
        foreach ($student_results as $result) {
            $subject_details = explode(':', $result);

            $fields .= '
                <div class="form-group">
                    <label for="" class="col-sm-5 control-label">'.Course::getSubject($subject_details[0], 'subject_name').'<span class="hidden"> ('. $subject_details[0] .')'. '</span>:</label>
                    <div class="col-sm-5">
                        <input name="subjects['.$subject_details[0]. ']" type="number" min="0" max="100" class="form-control" value="'. $subject_details[1] . '" data-rule-required="true">
                    </div>
                </div>
            ';
        }

        $form = '
            <form class="form-horizontal report-form" action="../includes/actions/report/edit-report.php" method="POST">
                <input name="report_id" type="text" style="display:none" value="'. $data['report_id'] .'">
                '.$fields. '
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline btn-success">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Cancel</button>
                </div>
            </form>
            <script>
                $(".report-form").on(\'submit\', function () {
                    var form = $(this);
                    var data = form.serialize();
                    var url = form.attr(\'action\');
                    var isValid = validateEditReportForm.valid();

                    if (isValid == true) {
                        $.ajax({
                            url: url,
                            dataType: "json",
                            type: "POST",
                            data: data,
                            success: function (data) {
                                if (data.error != "false") {
                                    $("#edit-report-modal").modal("hide");
                                    toastr.error(data.message, "Error!");
                                } else {
                                    $("#edit-report-modal").modal("hide");
                                    toastr.success(data.message, "Success!");

                                    $("#query-report-row").html(\'<div class ="text-center"><img src="../assets/images/loading.gif" width ="60px" height="60px"/></div>\');
                                    $.ajax({
                                        url: \'../includes/actions/report/fetch-class-report.php\',
                                        dataType: \'json\',
                                        type: \'GET\',
                                        data: { type: \'_getClassReport\', class_code: "'.$data['class_code'].'", academic_term: "'.$data['academic_term'].'", academic_year:"'.$data['academic_year'].'" },
                                        success: function(data) {
                                            if (data.error != \'false\') {
                                                swal(
                                                    \'Oops!\',
                                                    data.message,
                                                    \'error\'
                                                );
                                                $("#query-report-row").addClass(\'hidden\');
                                                $("#query-report-row").html(\'\');
                                                $("#query-class-row").removeClass(\'hidden\');
                                            } else {
                                                $("#query-report-row").html(data.page);
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }

                    return false;
                });

                var validateEditReportForm = $(".report-form").validate({
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
            </script>
        ';
        $response = array('error' => 'false', 'url' => 'reports', 'message' => "", 'student_name' => "", 'form' => $form);
    } catch (Exception $e) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "An error occured! Try again or Contact Us.");
    }

    echo json_encode($response);
?>