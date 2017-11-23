<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 
	require '../../Controllers/App.php';

	$app = new App();

	$errors = array();


	try {
		$school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
		$class_name = stripslashes($_POST['class_name']);

		$generateStudentPrefix = explode(' ', $class_name);

		if (sizeof($generateStudentPrefix) >= 2) {

			$year = substr(date('Y'),2);
			$class_number = $app->randomizer(4);

			$class_code = 'Test';
		}


		$response = array('error' => 'false', 'url' => 'class', 'class_code' => $class_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "");
	}

	echo json_encode($response);
?>

