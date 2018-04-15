<?php 
	require_once ('../Autoloader.php');

	$app = new App();

	$errors = array();


	try {
		$school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
		$class_name = stripslashes($_GET['class_name']);

		if (!empty($class_name)) {
			do {
				$year = substr(date('Y'), 2);
				$class_number = $app->randomizer(4);

				$class_code = 'CL' . $year . $school_prefix . $class_number;

				$query = Database::query("SELECT `id` FROM `ezi_school_class` WHERE `class_code` = '{$class_code}'");
			} while (!empty($query));
		}


		$response = array('error' => 'false', 'url' => 'class', 'class_code' => $class_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "");
	}

	echo json_encode($response);
?>

