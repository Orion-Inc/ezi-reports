<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

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

	$transact->beginTransaction();

	try {
		$updateStudent = Database::query("UPDATE `ezi_student` SET 
			`student_name`=:student_name 
			WHERE 
			`student_code`=:student_code", 
			$studentParams
		);

		$updateStudentDetails = Database::query("UPDATE `ezi_student_details` SET 
			`student_dob`=:student_dob,
			`student_gender`=:student_gender,
			`student_class`=:student_class,
			`student_status`=:student_status,
			`student_house`=:student_house
			WHERE 
			`student_code`=:student_code", 
			$student_detailsParams
		);

		$updateGuardianInfo = Database::query("UPDATE `ezi_student_guardian` SET 
			`guardian_name`=:guardian_name,
			`guardian_relationship`=:guardian_relationship,
			`guardian_occupation`=:guardian_occupation,
			`guardian_email`=:guardian_email,
			`guardian_telephone`=:guardian_telephone
			WHERE 
			`student_code`=:student_code", 
			$student_guardian_infoParams
		);

		$transact->commit();
		$response = array('error' => 'false', 'url' => 'student', 'message' => "Student Details Updated Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'student', 'message' => "An Error Occurred While Trying To Update Student.");
	}

	echo json_encode($response);
?>

