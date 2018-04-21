<?php
    require_once '../Autoloader.php';

    $app = new App();

    $transact = Database::connect();

    $errors = array();
    $data = $_POST;

    $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

    $results = '';
    $student_details = Student::getStudent($data['student_code'], "*");
    $school_details = School::getSchool($student_details['school_code'], "*");
    $school_crest = School::getSchoolCrest($student_details['school_code']);

    $img = base64_decode($school_crest);
    $im = imagecreatefromstring($img);

    $school_crest = "../../../assets/crests/" . strtolower(App::genRandomString(5)) . ".jpg";
    imagejpeg($im, $school_crest);

    $student_results = explode(',', $report_array[0]['terminal_report_grades']);
    foreach ($student_results as $result) {
        $subject_details = explode(':', $result);
        $report_details[] = array(
            'subject_name' => Course::getSubject($subject_details[0], 'subject_name'),
            '30' => '0',
            '70' => '0',
            'total_score' => $subject_details[1],
            'position' => '',
            'grade' => Course::getGrading($subject_details[1], 'grade'),
            'interpretation' => Course::getGrading($subject_details[1], 'interpretation'),
        );
    }

    $pdf = new Report('P', 'mm', 'A4', $student_details, $school_details, $school_crest, $report_details);
    $pdf->AddPage();//Set page to potrait,A4,0-No rotation of page
    $pdf->SetX(5);
    $pdf->SetMargins(0.5, 0.5, 0.5);//Set left,top and right page margins
    $pdf->studentDetails();
    $pdf->headerTable();
    $pdf->viewReport();
    $pdf->Output('D', 'Terminal Report.pdf');//output report to browser and force a download with the specified name.
    delete($school_crest);
?>