<?php 
    require_once 'Autoloader.php'; 
    $transact = Database::connect();

	$errors = array();
    
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
		'user_code' => stripslashes($_POST['user_code']),
        'oldAccessKey' => sha1($_POST['oldAccessKey']),
        'newAccessKey' => sha1($_POST['newAccessKey'])
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
?>

