<?php
	require_once ('../Autoloader.php');

	$errors = array();
	$school_code = $_SESSION['SESS_USER_ID'];
	$course_code = $_GET['course_code'];
    

    try {
		$classes = Classes::fetchCourseClasses($school_code,$course_code,"*");
		
		$classArray = array();

		foreach ($classes as $class) {
			$classArray[] = array('value' => $class['class_code'], 'name' => $class['class_name']);
		}

			$response = array(
					'error' => 'false', 
					'url' => 'school', 
					'array' => $classArray
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Retrieve Classes");
	}

	

	echo json_encode($response);
?>