<?php
    require_once '../Autoloader.php';
    $app = new App();
    
    $transact = Database::connect();

    $errors = array();
    #$data = $_POST;
    $data = $_POST;

    $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

    $results = '';
    $student_results = explode(',', $report_array[0]['terminal_report_grades']);

    $pdf = new Report();
    /*
    

    $pdf->AliasNbPages();
    $pdf->SetX(5);
    $pdf->AddPage('P', 'A4', 0);//Set page to potrait,A4,0-No rotation of page
    $pdf->SetMargins(0.5, 0.5, 0.5);//Set left,top and right page margins
    $pdf->studentDetails();
    $pdf->headerTable();
    $pdf->Output('D', 'Terminal Report.pdf');//output report to browser and force a download with the specified name.
    */
?>