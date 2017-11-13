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
	  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  $dbh->beginTransaction();
	  $dbh->exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
	  $dbh->exec("insert into salarychange (id, amount, changedate) 
	      values (23, 50000, NOW())");
	  $dbh->commit();
	  
	} catch (Exception $e) {
	  $dbh->rollBack();
	  echo "Failed: " . $e->getMessage();
	}
		
	try {
		//Create query
		//Error Exceptions
		
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

			$response = array('error' => 'false', 'url' => 'student', 'message' => "Student Details Updated Successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => "An Error Occurred While Trying To Update Student.");
	}

	echo json_encode($response);
?>

