<?php
	session_start();
	require_once '../Classes/Database.Class.php'; 
	require_once '../Controllers/App.php'; 
	require_once '../Classes/School.Class.php'; 

	$errors = array();

	$school_code = stripslashes($_POST['school_code']);

	if (empty($school_code)) {
		$response = array('error' => 'true', 'message' => 'Please enter Your School Code!');
	} else {

		$school = @Database::query("SELECT `school_id` FROM `ezi_school` WHERE `school_code`='$school_code'")[0];


		if($school['school_id']) {
			$_school = @Database::query("SELECT `school_email` FROM `ezi_school` WHERE `school_code`='$school_code'")[0];

			if ($_school['school_email']) {
				/*
				* Work on Code
				* For password recovery and change
				**/
				
				$response = array('error' => 'false', 'url' => '?verify');
			} else {
				$response = array('error' => 'true', 'message' => 'An Error occured while trying to verify your School Code. Please try again or Contact Us.');
			}
		}else{
			$response = array('error' => 'true', 'message' => 'Wrong School Code');
		}
	}
	

	

	echo json_encode($response);
?>



