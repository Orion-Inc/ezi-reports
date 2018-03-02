<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();
    $data = $_GET;

    $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `class_code` = '{$data['']}' AND `academic_year` = '{$data['']}' AND `academic_term` = '{$data['']}'");
    
    if (empty($report_array)) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "No reports found for this query!");
        echo json_encode($response);
        exit();
    }
    

?>