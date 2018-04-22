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
    $marks = 0;

    $get_strength = array();
    $get_weakness = array();

    foreach ($student_results as $result) {
        $subject_details = explode(':', $result);

        $subject_name = Course::getSubject($subject_details[0], 'subject_name');
        $total_score = $subject_details[1];
        $subject_grade = Course::getGrading($subject_details[1], 'grade');
        $grade_interpretation = Course::getGrading($subject_details[1], 'interpretation');

        $report[] = array(
            'subject_name' => $subject_name,
            '30' => '0',
            '70' => '0',
            'total_score' => $total_score,
            'position' => '',
            'grade' => $subject_grade,
            'interpretation' => $grade_interpretation,
        );
        $marks += $subject_details[1];

        if($total_score > 64){
            $get_strength[] = $subject_name;
        }

        if($total_score < 50){
            $get_weakness[] = $subject_name;
        }
    }

    
    $total = sizeof($report)*100;

    $remarks = Course::getTeacherRemarks($marks,$total);
    $strength = implode(', ', $get_strength);
    $weakness = implode(', ', $get_weakness);

    $report_details = array(
        'report' => $report,
        'raw_score' => $marks.' Out Of '.$total,
        'teachers_remarks' => $remarks,
        'strength' => $strength,
        'weakness' => $weakness
    );

    $pdf = new Report('P', 'mm', 'A4', $student_details, $school_details, $school_crest, $report_details);
    $pdf->AddPage();//Set page to potrait,A4,0-No rotation of page
    $pdf->SetX(5);
    $pdf->SetMargins(0.5, 0.5, 0.5);//Set left,top and right page margins
    $pdf->studentDetails();
    $pdf->headerTable();
    $pdf->viewReport();
    $pdf->Output("{$data['type']}", "{$student_details['student_name']}.pdf");//output report to browser and force a download with the specified name.
    delete($school_crest);
?>