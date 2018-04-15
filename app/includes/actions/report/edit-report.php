<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();

    $data = $_POST;

    $report_id = $data['report_id'];
    $subjects = $data['subjects'];

    foreach ($subjects as $subject => $grade) {
        $report_data[] = $subject . ':' . $grade; 
    }

    $reportParams = array(
        'report_code' => $report_id,
        'report_grades' => implode(",", $report_data)
    );

    $transact->beginTransaction();
    try{
        $updateReport = Database::query(
        "UPDATE `ezi_terminal_reports` SET `terminal_report_grades`= :report_grades WHERE `terminal_report_code` = :report_code",
            $reportParams
        );

        $transact->commit();
        $response = array('error' => 'false', 'url' => 'reports', 'message' => "Report Details Updated Successfully!");
    }catch(Exception $e){
        $transact->rollBack();
        $errors[] = $e->getMessage();
        $response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'reports', 'message' => "An Error Occurred While Trying To Update Student Report.");
    }

    echo json_encode($response);
?>