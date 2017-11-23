<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 
	require '../../Controllers/App.php';

	$app = new App();

	$errors = array();


	try {
		$student_code = "";
		$school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
		$student_name = stripslashes($_POST['student_name']);

		$generateStudentPrefix = explode(' ', $student_name);

		if (sizeof($generateStudentPrefix) >= 2) {
			$student_prefix = strtoupper($generateStudentPrefix[0][0].$generateStudentPrefix[1][0]);

			$year = substr(date('Y'),2);
			$student_number = $app->randomizer(4);

			$student_code = 'S'.$year.'/'.$school_prefix.'/'.$student_prefix.$student_number;
		}


		$response = array('error' => 'false', 'url' => 'student', 'student_code' => $student_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => "");
	}

	echo json_encode($response);
?>

