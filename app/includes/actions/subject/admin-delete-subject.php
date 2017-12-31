<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'subject_code' => stripslashes($_POST['subject_code'])
	);

	try {
		//Create query
			$query = Database::query("DELETE FROM `ezi_subjects` WHERE `subject_code` = :subject_code", $params);

			$response = array('error' => 'false', 'url' => 'admin-subjects', 'message' => "Subject was deleted successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-subjects', 'message' => "An Error Occurred While Trying To Delete Subject.");
	}

	echo json_encode($response);
?>

