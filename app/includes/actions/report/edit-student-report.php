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
        
        $fields = "";

        $student_results = explode(',', $report_array['terminal_report_grades']);


        foreach ($student_results as $result) {
            $subject_details = explode(':', $result);

            $fields .= '
                <div class="form-group">
                    <label for="" class="col-sm-5 control-label">'.Course::getSubject($subject_details[0], 'subject_name'). ':</label>
                    <div class="col-sm-5">
                        <input name="'.$subject_details[0].'" type="number" class="form-control" value="'. $subject_details[1] .'">
                    </div>
                </div>
            ';
        }

        $form = '
            <form class="form-horizontal report-form" action="" method="POST">
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
                
                return false;
            });
            </script>
        ';
        $response = array('error' => 'false', 'url' => 'reports', 'message' => "", 'student_name' => "", 'form' => $form);
    } catch (Exception $e) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "An error occured! Try again or Contact Us.");
    }

    echo json_encode($response);
?>