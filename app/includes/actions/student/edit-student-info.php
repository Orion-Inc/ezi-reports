
<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();

	$params = array( 
		'student_name' => stripslashes($_POST['student_name']), 
		'student_code' => 'SCIAF/001/18',
		'school_code' => App::show($_SESSION['SESS_USER_ID']), 
		'dob' => stripslashes($_POST['dob']),
		'gender' => stripslashes($_POST['gender']),
		'course' => stripslashes($_POST['course']),
		'class' => stripslashes($_POST['class']),
		'status' => stripslashes($_POST['status']),
		'house' => stripslashes($_POST['house'])
	);

	try {
		//Create query

			$query = Database::query("", $params);
			
			if ($query) {

				$query = Database::query("", $params);

				$response = array('error' => 'false', 'url' => 'student', 'message' => 'Student details added');
			}

			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => 'An Error Occurred While Trying To Perform The Insert!');
	}

	echo json_encode($response);
?>

