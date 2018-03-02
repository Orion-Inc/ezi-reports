<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();

    $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `class_code` = 'CL17PSB7032' AND `academic_year` = '2017 - 2018' AND `academic_term` = '1st Term'");
    
    if (empty($report_array)) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "No reports found for this query!");
        echo json_encode($response);
        exit();
    }
    

?>