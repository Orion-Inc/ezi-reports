<?php
require_once('../Autoloader.php');
$app = new App();
$transact = Database::connect();

$errors = array();
$class_code = $_POST['class-code'];
$school_code = $_SESSION['SESS_USER_ID'];
$academic_year = School::getAcademicYear($school_code, 'school_current_academic_year');
$academic_term = School::getAcademicYear($school_code, 'school_academic_term');

function generateCode()
{
    $school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
    $report_number = App::randomizer(4);

    $terminal_report_code = 'REP' . $school_prefix . $report_number;

    return $terminal_report_code;
}


if (!empty($_FILES['bulk_report_file']) && isset($_FILES['bulk_report_file']['name'])) {
    $file_checker = App::multiexplode(array("(", ")"), $_FILES['bulk_report_file']['name']);
    
    if($file_checker[1] != $class_code){
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "The file uploaded does not match the specified class.");
    }else{
        $csv = $_FILES['bulk_report_file']['tmp_name'];
        $file = fopen($csv, "r");
        $count = count(file($csv, FILE_SKIP_EMPTY_LINES));
        $k = 0;

        $csv = array_map('str_getcsv', file($_FILES['bulk_report_file']['tmp_name']));

        for ($i = 1; $i < sizeof($csv[0]); $i++) {
            $csv_class_subjects[] = App::multiexplode(array("(", ")"), $csv[0][$i])[1];
        }


        $data = array();
        $report_data = array();
        $stringified_report_data = array();

        while (!feof($file)) {
            $data[] = fgetcsv($file);
        }
        array_shift($data);
        $_data = array_values(array_filter($data));

        foreach ($_data as $student_grade) {
            $report_data = array(
                $csv_class_subjects[0].':'.$student_grade[1],
                $csv_class_subjects[1].':'.$student_grade[2],
                $csv_class_subjects[2].':'.$student_grade[3],
                $csv_class_subjects[3].':'.$student_grade[4],
                $csv_class_subjects[4].':'.$student_grade[5],
                $csv_class_subjects[5].':'.$student_grade[6],
                $csv_class_subjects[6].':'.$student_grade[7],
                $csv_class_subjects[7].':'.$student_grade[8]
            );

            $stringified_report_data[] = array(
                'terminal_report_code' => generateCode(),
                'school_code' => $school_code,
                'class_code' => $class_code,
                'student_code' => App::multiexplode(array("(", ")"), $student_grade[0])[1],
                'terminal_report_grades' => implode(",", $report_data),
                'academic_year' => $academic_year,
                'academic_term' => $academic_term
            );
        }

        $a = 0;

        while ($a < sizeof($stringified_report_data)) {
            $student_report = $stringified_report_data[$a];

            $params = array(
                'terminal_report_code' => $student_report['terminal_report_code'],
                'school_code' => $student_report['school_code'],
                'class_code' => $student_report['class_code'],
                'student_code' => $student_report['student_code'],
                'terminal_report_grades' => $student_report['terminal_report_grades'],
                'academic_year' => $student_report['academic_year'],
                'academic_term' => $student_report['academic_term']
            );





            $a++;
        }

        print("<pre>" . print_r($params, true) . "</pre>");
    }
} else {
    $response = array('error' => 'true', 'url' => 'reports', 'message' => "An Error Occurred! Please <a href=\"javascript:page('reports')\" data-dismiss=\"modal\">Try again.</a>");
}


//echo json_encode($response);

?>