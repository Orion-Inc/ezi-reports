<?php
    require_once ('../Autoloader.php');

    $errors = array();
    $data = $_POST;
    print_r($data);
    $school_code = '';

    $school_classes = Database::query("SELECT `class_code`,`class_group`,`identifier`  FROM `ezi_school_class` WHERE `school_code` = '{$school_code}'");
?>