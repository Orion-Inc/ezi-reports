<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'student_code' => stripslashes($_POST['student_code'])
	);

	try {
		//Create query
			$query = Database::query("DELETE FROM `ezi_student` WHERE `student_code` = :student_code", $params);

			$response = array('error' => 'false', 'url' => 'student', 'message' => "Student details deleted successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => "An Error Occurred While Trying To Delete Student.");
	}

	echo json_encode($response);
?>

