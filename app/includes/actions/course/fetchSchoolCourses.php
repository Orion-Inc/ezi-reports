<?php
	session_start();
	require '../../Classes/Database.Class.php';
	require '../../Controllers/App.php';  
	require '../../Classes/School.Class.php'; 
	require '../../Classes/Student.Class.php'; 
	require '../../Classes/Course.Class.php'; 

	$errors = array();
	$course_type = $_POST['school_type'];

    

    try {
		$courses = Course::getCourses($course_type,"*");
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