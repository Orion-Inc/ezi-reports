<?php require_once('../includes/Autoloader.php'); ?>
<?php
    $app = new App();

    $transact = Database::connect();

    $errors = array();
    #$data = $_POST;
    $data = $_GET;

    $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

    $results = '';
    $student_details = Student::getStudent($data['student_code'], "*");
    $school_details = School::getSchool($student_details['school_code'], "*");

    $student_results = explode(',', $report_array[0]['terminal_report_grades']);
    foreach ($student_results as $result) {
        $subject_details = explode(':', $result);
/*
        $results .= '<tr>
                                <th scope="row">' . Course::getSubject($subject_details[0], 'subject_name') . '</th>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center">' . $subject_details[1] . '</td>
                                <td class="text-center">' . Course::getGrading($subject_details[1], 'grade') . '</td>
                                <td>' . Course::getGrading($subject_details[1], 'interpretation') . '</td>
                            </tr>';
                        */
    }

        /*
        $pdf = new Report();

        $pdf->AliasNbPages();
        $pdf->SetX(5);
        $pdf->AddPage('P', 'A4', 0);//Set page to potrait,A4,0-No rotation of page
        $pdf->SetMargins(0.5, 0.5, 0.5);//Set left,top and right page margins
        $pdf->studentDetails();
        $pdf->headerTable();
        $pdf->Output('D', 'Terminal Report.pdf');//output report to browser and force a download with the specified name.
    */
$pdf = new Report();
print("<pre>" . print_r($student_details, true) . "</pre>");

print("<pre>" . print_r($school_details, true) . "</pre>");

print("<pre>" . print_r($student_results, true) . "</pre>");
?>