<?php
    require_once ('../Autoloader.php');
    $get = new Database();

    $class_code = "CL17PSB7032";//addslashes($_POST['class_code']);
    $school_code = User::userSession('SESS_USER_ID');

    $class_name = Classes::getClass($class_code,"class_name");
    $class_subjects = Classes::getClassSujects($class_code);
    $school_type = School::getSchool($school_code,'school_type');
    $students = $get->query("SELECT `ezi_student`.`student_name` FROM `ezi_student` JOIN `ezi_student_details` ON `ezi_student`.`student_code` = `ezi_student_details`.`student_code` WHERE `ezi_student`.`school_code` = '{$school_code}' AND `ezi_student_details`.`student_class`= '{$class_code}' ");

    $filepath = $class_name.' ('.$class_code.').csv';

/*
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
*/

    $elective_subjects = array();
    $student_list = array();

    foreach ($class_subjects as $subject) {
        $elective_subjects[] = $subject['subject_name']." (".$subject['subject_code'].")";
    }

    foreach ($students as $student) {
        $student_list[] = array($student['student_name']);
    }

    switch ($school_type) {
        case 'secondary':
            $subjects_header = array(
                'Student',
                'Mathematics (SJCMA0000)',
                'English Language (SJCEN000)',
                'Intergerated Science (SJCIN0000)',
                'Socail Studies (SJCSS0000)',
            );
            break;

        case 'basic':
             $subjects_header = array(
                'Student',
                'Mathematics (SJCMA0001)',
                'English Language (SJCEN001)',
                'Intergerated Science (SJCIN0001)',
                'Environmental Studies (SJCEN0001)',
            );
            break;

    }

    $file_headers = array_merge($subjects_header,$elective_subjects);
    

    $data = array(
        $file_headers,
        array_shift($student_list)
    );

    $data_ = array(
        //Our header (optional).
        array("Name", "Registration Date"),
        //Our data
        array("Tom", "2012-01-04"),
        array("Lisa", "2011-09-29"),
        array("Harry", "2013-12-12")
    );
    
    print("<pre>".print_r($data,true)."</pre>");
    print("<pre>".print_r($data_,true)."</pre>");

/*
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Content-Length: '.filesize($filepath));
    ob_clean();
    flush();
    readfile($filepath);
    exit();
*/
?>