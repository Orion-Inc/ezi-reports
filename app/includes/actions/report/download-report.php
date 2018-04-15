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

    $student_results = explode(',', $report_array[0]['terminal_report_grades']);
    foreach ($student_results as $result) {
        $subject_details = explode(':', $result);
        $report_details[] = array(
            'subject_name' => Course::getSubject($subject_details[0], 'subject_name'),
            '30' => '0',
            '70' => '0',
            'total_score' => $subject_details[1],
            'grade' => Course::getGrading($subject_details[1], 'grade'),
            'interpretation' => Course::getGrading($subject_details[1], 'interpretation'),
        );
    }

    print("<pre>".print_r($student_details,true)."</pre>");
    print("<pre>" . print_r($school_details, true) . "</pre>");
    print("<pre>" . print_r($report_details, true) . "</pre>");
?>