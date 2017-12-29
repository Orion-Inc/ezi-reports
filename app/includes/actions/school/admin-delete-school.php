<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'school_code' => stripslashes($_POST['school_code'])
	);

	try {
		//Create query
			$query = Database::query("DELETE FROM `ezi_school` WHERE `school_code` = :school_code", $params);

			$response = array('error' => 'false', 'url' => 'admin-school', 'message' => "School was deleted successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-school', 'message' => "An Error Occurred While Trying To Delete School.");
	}

	echo json_encode($response);
?>

