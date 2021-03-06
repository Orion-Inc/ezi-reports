<?php 
	require_once ('../Autoloader.php');

	$app = new App();

	$errors = array();


	try {
		$school_code = "";
		$school_name = stripslashes($_GET['school_name']);

		$generateSchoolPrefix = explode(' ', $school_name);

		if (sizeof($generateSchoolPrefix) >= 2) {
			$school_prefix = strtoupper($generateSchoolPrefix[0][0].$generateSchoolPrefix[1][0]);	
		}else {
			$school_prefix = strtoupper($generateSchoolPrefix[0][0].$generateSchoolPrefix[0][1]);
		}

		$year = substr(date('Y'),2);
		$school_number = $app->randomizer(4);

		$school_code = 'SCH'.$school_prefix.$school_number;


		$response = array('error' => 'false', 'url' => 'admin_school', 'school_code' => $school_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin_school', 'message' => "");
	}

	echo json_encode($response);
?>

