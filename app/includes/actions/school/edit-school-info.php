<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();

	$params = array( 
		'school_code' => stripslashes($_POST['school_code']), 
		'school_name' => stripslashes($_POST['school_name']),
		'school_motto' => stripslashes($_POST['school_motto']), 
		'school_telephone' => stripslashes($_POST['school_telephone']),
		'school_email' => stripslashes($_POST['school_email']),
		'school_website' => stripslashes($_POST['school_website']),
		'school_address' => stripslashes($_POST['school_address'])
	);

	try {
		//Create query
			$query = Database::query("UPDATE `ezi_school` SET `school_name`= :school_name,`school_motto`= :school_motto,`school_address`= :school_address,`school_email`= :school_email,`school_telephone`= :school_telephone,`school_website`= :school_website WHERE `school_code` = :school_code", $params);

			$response = array('error' => 'false', 'url' => 'school', 'message' => 'Your School Information Has Been Updated Successfully!');
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => 'An Error Occurred While Trying To Perform The Update!');
	}

	echo json_encode($response);
?>

