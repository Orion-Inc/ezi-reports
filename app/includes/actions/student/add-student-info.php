<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();

	$params = array( 
		'student_name' => stripslashes($_POST['student_name']), 
		'student_code' => stripslashes($_POST['student_code']),
		'school_code' => App::show($_SESSION['SESS_USER_ID']), 
		'dob' => stripslashes($_POST['dob']),
		'gender' => stripslashes($_POST['gender']),
		'course' => stripslashes($_POST['course']),
		'class' => stripslashes($_POST['class']),
		'status' => stripslashes($_POST['status']),
		'house' => stripslashes($_POST['house']),
		'guardian_code' => '',
		'guardian_name' => stripslashes($_POST['guardian_name']),
		'guardian_occupation' => stripslashes($_POST['guardian_occupation']),
		'guardian_contact1' => stripslashes($_POST['guardian_contact1']),
		'guardian_contact2' => stripslashes($_POST['guardian_contact2']),
		'guardian_city' => stripslashes($_POST['guardian_city']),
		'guardian_street' => stripslashes($_POST['guardian_street']),
		'guardian_country' => stripslashes($_POST['guardian_country']),
	);

	try {
		//Create query

			$query = Database::query("INSERT INTO `ezi_student`(`student_name`, `student_code`, `school_code`) VALUES (':student_name',':student_code',':school_code'", $params);
			
			if ($query) {

				$query = Database::query("INSERT INTO `ezi_student_details`( `student_code`, `dob`, `gender`, `course`, `class`, `status`, `house`) VALUES (':student_code',':dob',':gender',':course',':class',':status',':house')", $params);

				if ($query) {
					$query = Database::query("INSERT INTO `ezi_guardian_details`( `student_code`, `guardian_code`, `guardian_name`, `guardian_occupation`, `guardian_contact1`, `guardian_contact2`, `guardian_city`, `guardian_street`, `guardian_country`, `created_at`) VALUES (':student_code',':guardian_code',':guardian_name',':guardian_occupation',':guardian_contact1',':guardian_contact2',':guardian_city',':guardian_street',':guardian_country')", $params);

					$response = array('error' => 'false', 'url' => '', 'message' => '');
				}
			}

			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => '', 'message' => 'An Error Occurred While Trying To Perform The Update!');
	}

	echo json_encode($response);
?>

