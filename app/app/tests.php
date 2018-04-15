<?php require_once('../includes/Autoloader.php'); 

    $school_code = $_SESSION['SESS_USER_ID'];

    $school_classes = Database::query("SELECT `class_code`,`class_group`,`identifier`  FROM `ezi_school_class` WHERE `school_code` = '{$school_code}'");
    
    
    print("<pre>" . print_r($school_classes, true) . "</pre>");
?>