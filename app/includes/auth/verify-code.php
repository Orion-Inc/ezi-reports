<?php
    require_once 'Autoloader.php';

    $transact = Database::connect();
    $errors = array();

    $data = $_POST;


    if (empty($data['user']) || empty($data['verify_code'])) {
        $errors[0] = array('auth_error' => 'true', 'message' => "An error occured. Please contact Us.");
        $_SESSION['ERRORS'] = $errors[0];
        header("Location:../../../app/auth/?auth=forgot-password");
    } else {
        $verify_code = $data['verify_code'];

        $isUserValid = Database::query("SELECT `user_code`,`token` FROM `ezi_user_password_resets` WHERE `verification_code` ='{$verify_code}'")[0];
        
        if($data['user']['token'] != $isUserValid['token']){
            $errors[0] = array('auth_error' => 'true', 'message' => "Make sure you entered the correct Verification Code.");
            $_SESSION['ERRORS'] = $errors[0];
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }else {
            $user_code = $isUserValid['user_code'];
            $token = $isUserValid['token'];

            $transact->beginTransaction();
            try {
                $verifyParams = array(
                    'token' => $token,
                    'verification_code' => $verify_code
                );

                $verifyQuery = Database::query(
                "DELETE FROM `ezi_user_password_resets` 
                        WHERE 
                    `token` = :token
                        AND 
                    `verification_code` = :verification_code",
                    $verifyParams
                );

                $transact->commit();
                header("Location:../../../app/auth/?auth=access-code&x={$user_code}&y={$token}");
            } catch (PDOException $e) {
                $transact->rollBack();
                $errors[0] = array('auth_error' => 'true', 'error_msg' => $e->getMessage(), 'message' => "We encountered a problem while trying to verify your code.\nPlease try again or Contact Us.");
                $_SESSION['ERRORS'] = $errors[0];
                header("Location:../../../app/auth/?auth=forgot-password");
            }
        }
        
    }

?>