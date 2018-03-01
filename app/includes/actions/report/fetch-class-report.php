<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();

    $class_code = $_GET['class_code'];
    print_r($_GET);

    $report = Database::query("SELECT `terminal_report_code`,`student_code`,`terminal_report_grades`,`academic_year`,`academic_term` FROM `ezi_terminal_reports` WHERE `class_code` = '{$class_code}'");
    
?>