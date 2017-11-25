<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'class_code' => stripslashes($_POST['class_code'])
	);

	try {
		//Create query
			$query = Database::query("DELETE FROM `ezi_school_class` WHERE `class_code` = :class_code", $params);

			$response = array('error' => 'false', 'url' => 'class', 'message' => "Class Deleted Successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "An Error Occurred While Trying To Delete Class.");
	}

	echo json_encode($response);
?>

