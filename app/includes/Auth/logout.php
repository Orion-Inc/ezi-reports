<?php
	//Start session
	session_start();
	
	$params = array( 
		'school_code' => stripslashes($_POST['school_code']), 
		'token' => $token
	);


	try {
		$query = Database::query("UPDATE `ezi_school_access_key` SET `token`= :token WHERE `school_code` = :school_code", $params);

		$_SESSION['SESS_IS_AUTH'] = true;
		$_SESSION['SESS_USER_ID'] = School::getSchool($school_code,'school_code');
		$_SESSION['SESS_SCHOOL_PREFIX'] = School::getSchool($school_code,'school_prefix');
		$_SESSION['SESS_SCHOOL_NAME'] = School::getSchool($school_code,'school_name');
		$_SESSION['SESS_SCHOOL_TYP'] = School::getSchool($school_code,'school_type');
		$_SESSION['SESS_TOKEN'] = $token;


		$response = array('error' => 'false', 'url' => 'app.php');
	} catch (Exception $e) {
		$response = array('error' => 'true', 'message' => "An Error Occured!\nPlease try again or Contact Us.");
	}
		
		if ($_SESSION['SESS_IS_AUTH'] == true) {
			unset($_SESSION['SESS_IS_AUTH']);
			unset($_SESSION['SESS_USER_ID']);
			unset($_SESSION['SESS_SCHOOL_NAME']);
			unset($_SESSION['SESS_SCHOOL_TYP']);
			unset($_SESSION['SESS_TOKEN']);

			session_destroy();
			
			if(empty($_SESSION)){
				header("Location: ../../app/?login");
			}else{
				session_destroy();
				header("Location: ../../app/?login");
			}
		}else{
			session_destroy();
			
			if(empty($_SESSION)){
				header("Location: ../../app/?login");
			}
		}	
	exit;
?>