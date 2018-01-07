<?php 
    require_once ('../Autoloader.php');
    $get = new Database();

	$errors = array();
	$subject_code = $_GET['subject_code'];
	

	try {
		$subject = $get->query("SELECT * FROM `ezi_subjects` WHERE `subject_code`='{$subject_code}'")[0];

		$subject_details = array(
			'subject_name' => $subject['subject_name'],
			'course_code' => $subject['course_code'],
			'subject_description' => $subject['subject_description']
		);


			$response = array(
				'error' => 'false', 
				'url' => 'admin-subjects', 
				'array' => $subject_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-subjects', 'message' => "An Error Occurred While Trying To Retrieve Subject Information!");
	}

	

	echo json_encode($response);
?>