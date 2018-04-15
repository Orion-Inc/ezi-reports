<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();

    $params = array(
        'class_code' => $_POST['class_code'],
        'academic_year' => $_POST['academic_year'],
        'academic_term' => $_POST['academic_term']
    );

    try {
        $query = Database::query("DELETE FROM `ezi_terminal_reports` WHERE `class_code` = :class_code AND `academic_year` = :academic_year AND `academic_term` = :academic_term", $params);

        $response = array('error' => 'false', 'url' => 'reports', 'message' => "Proceed to upload grades.");
    } catch (Exception $e) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "An error occured! Try again or Contact Us.");
    }

    echo json_encode($response);
?>