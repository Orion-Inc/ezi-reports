<?php
	session_start();
	require_once '../Classes/Database.Class.php'; 
	require_once '../Controllers/App.php'; 
	require_once '../Classes/School.Class.php'; 

	$generate = new App();


	$errors = array();
	
	$school_code = stripslashes($_POST['school_code']);
	$access_key  = stripslashes($_POST['access_key']);

	//Create query
	
	$school = School::getSchool($school_code,'school_id');

	if(!empty($school)) {
		$schoolParams = array( 
			'student_code' => $school_code,
			'access_key' => sha1($access_key)
		);


		$_school = Database::query("SELECT `school_code` FROM `ezi_school_access_key` WHERE 
			`school_code`='{$schoolParams['student_code']}'  
			AND 
			`access_key`='{$schoolParams['access_key']}'"
		);

		if (!empty($_school[0])) {
			$token = $generate->token_generator();

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


				$response = array('error' => 'false', 'url' => '../app/?token='.$_SESSION['SESS_TOKEN']);
			} catch (Exception $e) {
				$response = array('error' => 'true', 'message' => "An Error Occured!\nPlease try again or Contact Us.");
			}
		} else {
			$response = array('error' => 'true', 'message' => "An Error occured while trying to verify your School Code.\nPlease try again or Contact Us.");
		}
	}else{
		$response = array('error' => 'true', 'message' => "Wrong School Code or Access Key");
	}

	echo json_encode($response);
?>



