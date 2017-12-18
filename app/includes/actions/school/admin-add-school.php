<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$school_name = stripslashes($_POST['school_name']);

		$generateSchoolPrefix = explode(' ', $school_name);

		if (sizeof($generateSchoolPrefix) >= 2) {
			$school_prefix = strtoupper($generateSchoolPrefix[0][0].$generateSchoolPrefix[0][1].$generateSchoolPrefix[1][0]);
		}

	$params = array( 
		'school_code' => stripslashes($_POST['school_code']), 
		'school_type' => stripslashes($_POST['school_type']), 
		'school_name' => stripslashes($_POST['school_name']),
		'school_prefix'=> $school_prefix,
		'school_motto' => stripslashes($_POST['school_motto']), 
		'school_telephone' => stripslashes($_POST['school_telephone']),
		'school_email' => stripslashes($_POST['school_email']),
		'school_website' => stripslashes($_POST['school_website']),
		'school_address' => stripslashes($_POST['school_address']),
		'school_location' => stripslashes($_POST['school_location'])
	);

	try {
		//Create query
			$query = Database::query("INSERT INTO `ezi_school`( 
				`school_code`, 
				`school_prefix`, 
				`school_type`, 
				`school_name`, 
				`school_motto`, 
				`school_location`, 
				`school_address`, 
				`school_email`, 
				`school_telephone`, 
				`school_website`) 
				VALUES (
				:school_code,
				:school_prefix,
				:school_type,
				:school_name,
				:school_motto,
				:school_location,
				:school_address,
				:school_email,
				:school_telephone,
				:school_website
				)", 
				$params
			);

			$response = array('error' => 'false', 'url' => 'admin-school', 'message' => "The School Information Has Been Updated Successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-school', 'message' => "An Error Occurred While Trying To Perform The Update!");
	}

	echo json_encode($response);
?>

