<?php 
    require_once ('../Autoloader.php');
    $get = new Database();

	$errors = array();
	$course_code = $_GET['course_code'];
	

	try {
		$course = $get->query("SELECT * FROM `ezi_course` WHERE `course_code`='{$course_code}'")[0];

		$course_details = array(
			'course_name' => $course['course_name'],
			'course_type' => $course['course_type'],
			'course_description' => $course['course_description']
		);


			$response = array(
				'error' => 'false', 
				'url' => 'admin-courses', 
				'array' => $course_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-courses', 'message' => "An Error Occurred While Trying To Retrieve Course Information!");
	}

	

	echo json_encode($response);
?>