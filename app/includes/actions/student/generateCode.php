<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();


	try {
		$school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
		$year = substr(date('Y'),2);
		$student_number = '';

		$student_code = 'S'.$year.'/'.$school_prefix.'/'.$student_number;

		$response = array('error' => 'false', 'url' => 'student', 'student_code' => $student_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => "");
	}

	echo json_encode($response);
?>

