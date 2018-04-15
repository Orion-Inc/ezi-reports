<?php
    require_once '../Autoloader.php';
    $get = new Database();

    $errors = array();
    $data = $_POST;
    

    try {
        $thisClass = $get->query("SELECT `class_group`,`identifier` FROM `ezi_school_class` WHERE `class_code` = '{$data['current_class']}'")[0];

        $thisClass_identifier = $thisClass['identifier'];
        $class_group = $thisClass['class_group'];

        $nextClass_identifier = $thisClass_identifier + 1;

        if($nextClass_identifier > 3){
            $classArray[] = array('value' => '', 'name' => 'Alumini');
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