<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();
    $data = $_GET;
    $page = '';

    if ($data['type'] == '_getClassReport') {
        $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `class_code` = '{$data['class_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");
    }

    if ($data['type'] == '_getStudentReport') {
        $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");
    }

    if (empty($report_array)) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "No reports found for this query!");
        echo json_encode($response);
        exit();
    }

    if (!empty($report_array)) {
        foreach ($report_array as $report) {
            $view = '<button class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#admin-view-report-modal" data-report="' . $report[''] . '"><i class="ti-eye"></i></button>';
            $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#admin-edit-report-modal" data-report="' . $report[''] . '"><i class="ti-pencil"></i></button>';

            $options = '<div role="group" class="btn-group">' . $view . $edit . '</div>';

            

            
        }
    }

    $response = array(
        'error' => 'false', 
        'url' => 'reports', 
        'page' => $page
    );
    
    echo json_encode($response);
?>