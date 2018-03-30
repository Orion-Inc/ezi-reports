<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();

    try {
        
        
    } catch (Exception $e) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "An error occured! Try again or Contact Us.");
    }

    echo json_encode($response);
?>