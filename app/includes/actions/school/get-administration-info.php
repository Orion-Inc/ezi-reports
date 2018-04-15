<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	try {
		$schoo_academic_info = School::getAdministration($_SESSION['SESS_USER_ID'],"*");

			$response = array('error' => 'false', 'url' => 'school', 'array' => $schoo_academic_info);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Retrieve School Information");
	}

	

	echo json_encode($response);
?>