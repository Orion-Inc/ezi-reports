<?php
    require_once 'Autoloader.php';

    $transact = Database::connect();
    $errors = array();

    $data = $_POST;

    $dir = '/ezi-reports/app';

    if (empty($data['user']) || empty($data['verify_code'])) {
        $errors[0] = array('auth_error' => 'true', 'message' => "An error occured. Please contact Us.");
        $_SESSION['ERRORS'] = $errors[0];
        header("Location:../../../app/auth/?auth=forgot-password");
    } else {
        $verify_code = $data['verify_code'];

        $isUserValid = Database::query("SELECT `user_code`,`token` FROM `ezi_user_password_resets` WHERE `verification_code` ='{$verify_code}'")[0];

        
        print_r($isUserValid);
    }

?>