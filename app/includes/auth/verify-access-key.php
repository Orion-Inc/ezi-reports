<?php 
	require_once 'Autoloader.php'; 

    $errors = array();
    
    $user_code = $_SESSION['SESS_USER_ID'];
    $access_key  = sha1($_POST['oldAccessKey']);
    
    switch ($_SESSION['SESS_USER_TYP']) {
        case 'school':
        case 'student':
            try {
                $verifyAccessKey = Database::query("SELECT `access_key_id` FROM `ezi_users` WHERE `user_code`='{$user_code}' AND `access_key`='{$access_key}'");
                
                if (!empty($verifyAccessKey[0])) {
                    echo json_encode(true);
                } else {
                    echo json_encode("Please Enter Your Correct Access Key");
                }
                
                
            } catch (Exception $e) {
                echo json_encode("An Error Occured While Trying to Verify Access Key");
            }
            break;
        
        case 'eziAdmin':
            try {
                $verifyAccessKey = Database::query("SELECT `id` FROM `ezi_admin` WHERE `username`='{$user_code}' AND `password`='{$access_key}'");
                
                if (!empty($verifyAccessKey[0])) {
                    echo json_encode(true);
                } else {
                    echo json_encode("Please Enter Your Correct Password");
                }
                
                
            } catch (Exception $e) {
                echo json_encode("An Error Occured While Trying to Verify Password");
            }
            break;
    }

    
?>

