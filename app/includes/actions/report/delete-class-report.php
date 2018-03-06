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
        //Create query
        $query = Database::query("", $params);

        $response = array('error' => 'false', 'url' => 'reports', 'message' => "");
    } catch (Exception $e) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "");
    }

    echo json_encode($response);
?>