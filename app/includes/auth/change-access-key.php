<?php 
    require_once 'Autoloader.php'; 
    $transact = Database::connect();

	$errors = array();
    $data = $_POST;

    
    if(isset($data['user']['code']) && isset($data['user']['token'])){
        $authParams = array(
            'user_code' => stripslashes($data['user']['code']),
            'access_key' => sha1($data['access_key'])
        );

        $transact->beginTransaction();
        try {
            $updateAccessKey = Database::query(
                "UPDATE `ezi_users` 
                    SET 
                `access_key`= :access_key
                    WHERE 
                `user_code` = :user_code",
                $authParams
            );

            $transact->commit();
            $errors[0] = array('auth_error' => 'true', 'type' => 'success', 'message' => "Access Code changed sucessfully!.\nPlease login to continue.");
            $_SESSION['ERRORS'] = $errors[0];
            header("Location:../../../app/auth/?auth=login");
        } catch (PDOException $e) {
            $transact->rollBack();
            $errors[0] = array('auth_error' => 'true', 'type' => 'error', 'error_msg' => $e->getMessage(), 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
            $_SESSION['ERRORS'] = $errors[0];
            header("Location:../../../app/auth/?auth=forgot-password");
        }
    }else{
        switch ($_SESSION['SESS_USER_TYP']) {
            case 'school':
                $url = "settings";
                break;
            case 'student':
                $url = "student-settings";
                break;
            case 'eziAdmin':
                $url = "admin-settings";
                break;
        }
        
        $authParams = array( 
            'user_code' => stripslashes($data['user_code']),
            'oldAccessKey' => sha1($data['oldAccessKey']),
            'newAccessKey' => sha1($data['newAccessKey'])
        );

        switch ($_SESSION['SESS_USER_TYP']) {
            case 'school':
            case 'student':
                $transact->beginTransaction();
                try {
                    $updateAccessKey = Database::query("UPDATE `ezi_users` SET 
                        `access_key`= :newAccessKey
                        WHERE 
                        `user_code`= :user_code
                        AND 
                        `access_key`= :oldAccessKey", 
                        $authParams
                    );

                    $transact->commit();
                    $response = array('error' => 'false', 'url' => $url, 'message' => "Access Key Changed Successfully!");
                } catch (PDOException $e) {
                    $transact->rollBack();
                    $errors[] = $e->getMessage();
                    $response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => $url, 'message' => "An Error Occurred While Trying To Change Access Key");
                }
                break;
            case 'eziAdmin':
                $transact->beginTransaction();
                try {
                    $updateAccessKey = Database::query("UPDATE `ezi_admin` SET 
                        `password`= :newAccessKey
                        WHERE 
                        `id`= :user_code
                        AND 
                        `password`= :oldAccessKey", 
                        $authParams
                    );

                    $transact->commit();
                    $response = array('error' => 'false', 'url' => $url, 'message' => "Password Changed Successfully!");
                } catch (PDOException $e) {
                    $transact->rollBack();
                    $errors[] = $e->getMessage();
                    $response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => $url, 'message' => "An Error Occurred While Trying To Change Password");
                }
                break;
        }
        echo json_encode($response);
    }
?>

