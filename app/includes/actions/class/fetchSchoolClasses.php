<?php
	session_start();
	require '../../Classes/Database.Class.php';
	require '../../Controllers/App.php';  
	require '../../Classes/School.Class.php'; 
	require '../../Classes/Student.Class.php'; 
	require '../../Classes/Course.Class.php'; 

	$errors = array();
	$school_code = $_SESSION['SESS_USER_ID'];

    

    try {
		$classes = Classes::fetchClasses($school_code,"*");
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