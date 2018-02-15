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
        print("<pre>" . print_r($csv_class_subjects, true) . "</pre><br>");

        while (!feof($file)) {
            $data = fgetcsv($file);

            //print_r($data[0]);
            print("<pre>" . print_r($data, true) . "</pre>");
        }

        
        
       // print_r($csv[0]); # remove column header
    }
} else {
    $response = array('error' => 'true', 'url' => 'reports', 'message' => "An Error Occurred! Please <a href=\"javascript:page('reports')\" data-dismiss=\"modal\">Try again.</a>");
}


//echo json_encode($response);

?>