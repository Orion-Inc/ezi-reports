<?php require_once('../includes/Autoloader.php'); 

    $student = Student::getStudent('S17PSBAF9267', '*');

    print("<pre>" . print_r($student, true) . "</pre>");
?>