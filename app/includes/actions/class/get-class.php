<?php 
	require_once ('../Autoloader.php');

	$errors = array();
	$class_code = $_GET['class_code'];
	

	try {
		$class = Classes::getClass($class_code,"*")[0];

		$class_details = array(
			'class_name' => $class['class_name'],
			'class_course' => $class['class_course'],
			'class_teacher' => $class['class_teacher']
		);


			$response = array(
				'error' => 'false', 
				'url' => 'class', 
				'array' => $class_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "An Error Occurred While Trying To Retrieve Class Information");
	}

	

	echo json_encode($response);
?>