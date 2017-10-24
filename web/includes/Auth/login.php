<?php
	session_start();
	require_once '../Classes/Database.Class.php'; 
	require_once '../Classes/App.Class.php'; 
	require_once '../Classes/School.Class.php'; 

	$errors = array();

	$school_code = stripslashes($_POST['school_code']);
	$student_code  = stripslashes($_POST['student_code']);
	$access_key  = stripslashes($_POST['access_key']);

	//Create query
	
	$student = Database::query("SELECT * FROM `ezi_student` WHERE `student_code`='$student_code'  AND `school_code`='$school_code'");

	if($student) {
		$_student = Database::query("SELECT * FROM `ezi_student_access_key` WHERE `student_code`='$student_code'  AND `access_key`='".sha1($access_key)."'");
		if ($_student) {
			$_SESSION['SESS_IS_AUTH'] = true;
			$_SESSION['SESS_USER_ID'] = $student_code;
			
			$response = array('error' => 'false', 'url' => 'app/');
		} else {
			$response = array('error' => 'true', 'message' => 'Wrong Student Code or Access Key');
		}
	}else{
		$response = array('error' => 'true', 'message' => 'You are Not Enrolled in '.School::getSchool($school_code,'school_name').'!<br>Please select Your <a href="">School</a> Again.');
	}

	echo json_encode($response);
?>



