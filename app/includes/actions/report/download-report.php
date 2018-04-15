<?php
    require_once '../Autoloader.php';
    $app = new App();
    $transact = Database::connect();

    $errors = array();
    $data = $_POST;

    $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

    $results = '';
    $student_results = explode(',', $report_array[0]['terminal_report_grades']);
?>