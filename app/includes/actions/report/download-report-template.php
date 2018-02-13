<?php
    require_once ('../Autoloader.php');
    $get = new Database();

    $class_code = addslashes($_POST['class_code']);
    $school_code = User::userSession('SESS_USER_ID');

    $class_name = Classes::getClass($class_code,"class_name");
    $class_subjects = Classes::getClassSujects($class_code);
    $school_type = School::getSchool($school_code,'school_type');
    $students = $get->query("SELECT `ezi_student`.`student_name`, `ezi_student`.`student_code` FROM `ezi_student` JOIN `ezi_student_details` ON `ezi_student`.`student_code` = `ezi_student_details`.`student_code` WHERE `ezi_student`.`school_code` = '{$school_code}' AND `ezi_student_details`.`student_class`= '{$class_code}' ");

    $fileName = $class_name.' ('.$class_code.').csv';


    //header('Content-Description: File Transfer');
    header('Content-Type: application/excel');
    header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
    /*
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Content-Length: '.filesize($filepath));
    ob_clean();
    flush();
    readfile($filepath);
    */

    $elective_subjects = array();
    $student_list = array();

    foreach ($class_subjects as $subject) {
        $elective_subjects[] = $subject['subject_name']." (".$subject['subject_code'].")";
    }

    switch ($school_type) {
        case 'secondary':
            $subjects_header = array(
                'STUDENT',
                'Mathematics (SJCMA0000)',
                'English Language (SJCEN0000)',
                'Intergerated Science (SJCIN0000)',
                'Socail Studies (SJCSS0000)',
            );
            break;

        case 'basic':
             $subjects_header = array(
                'STUDENT',
                'Mathematics (SJCMA0001)',
                'English Language (SJCEN0001)',
                'Intergerated Science (SJCIN0001)',
                'Environmental Studies (SJCEN0001)',
            );
            break;

    }

    $file_headers = array_merge($subjects_header,$elective_subjects);
    

    $data = array(
        $file_headers
    );

    $i=1;
    foreach ($students as $student) {
        $data[$i] = array($student['student_name']." (".$student['student_code'].")");
        $i++;
    }
    
    $fp = fopen('php://output', 'w');
    foreach ($data as $row) {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

?>