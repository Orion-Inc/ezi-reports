<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	try {
		$school_academic_year = School::getAcademicYear();

			$response = array('error' => 'false', 'url' => 'school', 'array' => $school_academic_year);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Retrieve School Information");
	}

	

	echo json_encode($response);
?>