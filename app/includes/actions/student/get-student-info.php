<?php 
	require_once ('../Autoloader.php');

	$errors = array();
	$student_code = $_POST['student_code'];
	

	try {
		$student_details = array();
		$student_info = Student::getStudent($student_code,"*");
		$student_guardian_info = Student::getStudentGuardian($student_code,"*");


		$student_details = array(
			'student_name' => $student_info['student_name'],
			'student_dob' => $student_info['student_dob'],
			'student_gender' => $student_info['student_gender'],
			'student_course' => Course::getCourse(Student::getStudent($student_info['student_code'],'student_class'),'course_code'),
			'student_class' => $student_info['student_class'],
			'student_status' => $student_info['student_status'],
			'student_house' => $student_info['student_house']
		);


		$student_details = array_merge($student_details,$student_guardian_info);

			$response = array(
				'error' => 'false', 
				'url' => 'student', 
				'array' => $student_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => "An Error Occurred While Trying To Retrieve Student's Information");
	}

	

	echo json_encode($response);
?>