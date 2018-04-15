<?php
	require_once ('../Autoloader.php');

	$errors = array();

    try {
		$courses = Course::getCourses("All","*");
		$courseArray = array();

		foreach ($courses as $course) {
			$courseArray[] = array('value' => $course['course_code'], 'name' => $course['course_name']);
		}

			$response = array(
					'error' => 'false', 
					'url' => ' ', 
					'array' => $courseArray
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => ' ', 'message' => "An Error Occurred While Trying To Retrieve Courses");
	}

	

	echo json_encode($response);
?>