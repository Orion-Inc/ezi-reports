<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();

	$params = array( 
		'student_name' => stripslashes($_POST['student_name']), 
		'student_code' => 
		'school_code' => stripslashes($_POST['school_code']), 
		'dob' => stripslashes($_POST['dob']),
		'gender' => stripslashes($_POST['gender']),
		'course' => stripslashes($_POST['course']),
		'class' => stripslashes($_POST['class']),
		'status' => stripslashes($_POST['status']),
		'house' => stripslashes($_POST['house'])
	);

	try {
		//Create query

			$query = Database::query("INSERT INTO `ezi_student`(`student_name`, `student_code`, `school_code`) VALUES (':student_name',':student_code',':school_code'", $params);
			
			if ($query) {

				$query = Database::query("INSERT INTO `ezi_student_details`( `student_code`, `dob`, `gender`, `course`, `class`, `status`, `house`) VALUES (':student_code',':dob',':gender',':course',':class',':status',':house')", $params);

				$response = array('error' => 'false', 'url' => '', 'message' => '');
			}

			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => '', 'message' => 'An Error Occurred While Trying To Perform The Update!');
	}

	echo json_encode($response);
?>

