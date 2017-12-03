<?php 
	require_once ('../Autoloader.php');

	$app = new App();

	$errors = array();


	try {
		$school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
		$class_name = stripslashes($_POST['class_name']);

		if (!empty($class_name)) {

			$year = substr(date('Y'),2);
			$class_number = $app->randomizer(4);

			$class_code = 'CL'.$year.'/'.$school_prefix.'/'.$class_number;
		}


		$response = array('error' => 'false', 'url' => 'class', 'class_code' => $class_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "");
	}

	echo json_encode($response);
?>

