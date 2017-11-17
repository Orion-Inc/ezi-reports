<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();

	$studentParams = array( 
		'student_code' => stripslashes($_POST['student_code']),
		'student_name' => stripslashes($_POST['student_name'])
	);

	$student_detailsParams = array( 
		'student_code' => stripslashes($_POST['student_code']),
		'student_dob' => stripslashes($_POST['student_dob']),
		'student_gender' => stripslashes($_POST['student_gender']),
		'student_class' => stripslashes($_POST['student_class']),
		'student_status' => stripslashes($_POST['student_status']),
		'student_house' => stripslashes($_POST['student_house'])
	);

	$student_guardian_infoParams = array( 
		'student_code' => stripslashes($_POST['student_code']),
		'guardian_name' => stripslashes($_POST['guardian_name']),
		'guardian_relationship' => stripslashes($_POST['guardian_relationship']),
		'guardian_occupation' => stripslashes($_POST['guardian_occupation']),
		'guardian_email' => stripslashes($_POST['guardian_email']),
		'guardian_telephone' => stripslashes($_POST['guardian_telephone'])
	);

	try {
		Database::connect()->beginTransaction();

			$updateStudent = Database::query("INSERT INTO `ezi_student`(`student_name`, `student_code`, `school_code`) VALUES ()", 
				$studentParams
			);

			$updateStudentDetails = Database::query("INSERT INTO `ezi_student_details`(`student_code`, `student_dob`, `student_gender`, `student_class`, `student_status`, `student_house`) VALUES ()", 
				$student_detailsParams
			);

			$updateGuardianInfo = Database::query("INSERT INTO `ezi_student_guardian`(`student_code`, `guardian_name`, `guardian_relationship`, `guardian_occupation`, `guardian_email`, `guardian_telephone`) VALUES ()", 
				$student_guardian_infoParams
			);

			$response = array('error' => 'false', 'url' => 'student', 'message' => "New Student Created Successfully!");
	} catch (PDOException $e) {
		Database::connect()->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'student', 'message' => "An Error Occurred While Trying To Create Student.");
	}

	echo json_encode($response);
?>

