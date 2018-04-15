<?php
    require_once '../Autoloader.php';
    $app = new App();
    $get = new Database();

    $errors = array();
    $data = $_POST;
    

    try {
        $thisClass = $get->query("SELECT `class_group`,`identifier` FROM `ezi_school_class` WHERE `class_code` = '{$data['current_class']}'")[0];

        $thisClass_identifier = $thisClass['identifier'];
        $class_group = $thisClass['class_group'];

        $nextClass_identifier = $thisClass_identifier + 1;

        if($nextClass_identifier > 3){
            $generateSchoolPrefix = explode(' ', $_SESSION['SESS_SCHOOL_NAME']);

            if (sizeof($generateSchoolPrefix) >= 2) {
                $school_prefix = strtoupper($generateSchoolPrefix[0][0] . $generateSchoolPrefix[1][0]);
            } else {
                $school_prefix = strtoupper($generateSchoolPrefix[0][0] . $generateSchoolPrefix[0][1]);
            }

            do {
                $year = substr(date('Y'), 2);
                $batch_number = $app->randomizer(4);

                $alumini_code = 'ALU' . $school_prefix . $batch_number;

                $query = Database::query("SELECT `id` FROM `ezi_student_class` WHERE `student_class` = '{$alumini_code}'");
            } while (!empty($query));

            $classArray[] = array('value' => $alumini_code, 'name' => 'Alumini');
        }else {
            $nextClass = $get->query("SELECT `class_code`,`class_name` FROM `ezi_school_class` WHERE `class_group`='{$class_group}' AND `identifier`='{$nextClass_identifier}'")[0];
            $classArray[] = array('value' => $nextClass['class_code'], 'name' => $nextClass['class_name']);
        }

        $response = array(
            'error' => 'false',
            'url' => 'promote-class',
            'classes' => $classArray
        );
    } catch (Exception $e) {
        $response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Retrieve Classes");
    }
    echo json_encode($response);
?>