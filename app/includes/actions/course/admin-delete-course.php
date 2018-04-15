<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'course_code' => stripslashes($_POST['course_code'])
	);

	try {
		//Create query
			$query = Database::query("DELETE FROM `ezi_course` WHERE `course_code` = :course_code", $params);

			$response = array('error' => 'false', 'url' => 'admin-courses', 'message' => "Course was deleted successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-courses', 'message' => "An Error Occurred While Trying To Delete Course.");
	}

	echo json_encode($response);
?>

