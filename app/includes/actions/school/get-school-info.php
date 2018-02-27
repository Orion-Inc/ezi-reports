<?php 
	require_once ('../Autoloader.php'); 

	$errors = array();

	if (isset($_GET['school_code']) && !empty($_GET['school_code'])) {
		$school_code = $_GET['school_code'];
	} else {
		$school_code = $_SESSION['SESS_USER_ID'];
	}
	

	try {
		$schoo_information = School::getSchool($school_code,"*");

			$response = array('error' => 'false', 'url' => 'school', 'array' => $schoo_information);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Retrieve School Information");
	}

	

	echo json_encode($response);
?>