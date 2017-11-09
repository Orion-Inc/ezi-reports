<?php
	session_start();
	require_once '../Classes/Database.Class.php'; 
	require_once '../Controllers/App.php'; 
	require_once '../Classes/School.Class.php'; 

	$errors = array();

	$school_code = stripslashes($_POST['school_code']);
	$access_key  = stripslashes($_POST['access_key']);

	//Create query
	

	$school = @Database::query("SELECT `school_id` FROM `ezi_school` WHERE `school_code`='$school_code'")[0];


	if($school['school_id']) {
		$_school = Database::query("SELECT * FROM `ezi_school_access_key` WHERE `school_code`='$school_code'  AND `access_key`='".sha1($access_key)."'")[0];
		if ($_school) {
			$_SESSION['SESS_IS_AUTH'] = true;
			$_SESSION['SESS_USER_ID'] = School::getSchool($school_code,'school_code');;
			$_SESSION['SESS_SCHOOL_NAME'] = School::getSchool($school_code,'school_name');
			$_SESSION['SESS_SCHOOL_TYP'] = School::getSchool($school_code,'school_type');
			$_SESSION['SESS_TOKEN'] = $_school['token'];


			$response = array('error' => 'false', 'url' => 'app.php');
		} else {
			$response = array('error' => 'true', 'message' => "An Error occured while trying to verify your School Code.\nPlease try again or Contact Us.");
		}
	}else{
		$response = array('error' => 'true', 'message' => "Wrong School Code or Access Key");
	}

	echo json_encode($response);
?>



