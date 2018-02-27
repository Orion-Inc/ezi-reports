<?php
	require_once 'Autoloader.php'; 
	
	$params = array( 
		'user_code' => $_SESSION['SESS_USER_ID'], 
		'token' => NULL
	);


	try {
		$query = Database::query("UPDATE `ezi_users` SET `token`= :token WHERE `user_code` = :user_code", $params);

		switch ($_SESSION['SESS_USER_TYP']) {
			case 'eziAdmin':
				unset($_SESSION['SESS_IS_AUTH']);
				unset($_SESSION['SESS_USER_TYP']);
				unset($_SESSION['SESS_USER_ID']);
				unset($_SESSION['SESS_USER_NAME']);
				unset($_SESSION['SESS_TOKEN']);
				break;
			
			case 'school':
				unset($_SESSION['SESS_IS_AUTH']);
				unset($_SESSION['SESS_USER_TYP']);
				unset($_SESSION['SESS_USER_ID']);
				unset($_SESSION['SESS_SCHOOL_PREFIX']);
				unset($_SESSION['SESS_SCHOOL_NAME']);
				unset($_SESSION['SESS_SCHOOL_TYP']);
				unset($_SESSION['SESS_TOKEN']);
				break;
			
			case 'student':
				unset($_SESSION['SESS_IS_AUTH']);
				unset($_SESSION['SESS_USER_TYP']);
				unset($_SESSION['SESS_USER_ID']);
				unset($_SESSION['SESS_STUDENT_NAME']);
				unset($_SESSION['SESS_TOKEN']);
				break;
			
			default:
				# code...
				break;
		}

		session_destroy();
		header("Location: ../../auth/?auth=login");
	} catch (Exception $e) {
		session_destroy();
		header("Location: ../../auth/?auth=login");
	}
		
?>