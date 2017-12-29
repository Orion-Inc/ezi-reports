<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'school_code' => stripslashes($_POST['school_code']), 
		'school_type' => stripslashes($_POST['school_type']), 
		'school_name' => stripslashes($_POST['school_name']),
		'school_motto' => stripslashes($_POST['school_motto']), 
		'school_telephone' => stripslashes($_POST['school_telephone']),
		'school_email' => stripslashes($_POST['school_email']),
		'school_website' => stripslashes($_POST['school_website']),
		'school_address' => stripslashes($_POST['school_address']),
		'school_location' => stripslashes($_POST['school_location'])

	);

	try {
		//Create query
			$query = Database::query("UPDATE `ezi_school` SET `school_type`=:school_type,`school_name`=:school_name,`school_motto`=:school_motto,`school_location`=:school_location,`school_address`=:school_address,`school_email`=:school_email,`school_telephone`=:school_telephone,`school_website`=:school_website WHERE `school_code`=:school_code", $params);

			$response = array('error' => 'false', 'url' => 'admin-school', 'message' => "The School Information Has Been Updated Successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-school', 'message' => "An Error Occurred While Trying To Perform The Update!");
	}

	echo json_encode($response);
?>

