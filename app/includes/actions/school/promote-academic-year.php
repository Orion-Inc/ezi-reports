<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();

	$params = array( 
		'school_code' => stripslashes($_POST['school_code']),
		'school_current_academic_year' => stripslashes($_POST['school_current_academic_year']), 
		'school_academic_term' => stripslashes($_POST['school_academic_term'])
	);

	try {
		//Create query
			$query = Database::query("UPDATE `ezi_school_academic_year` SET `school_current_academic_year`= :school_current_academic_year,`school_academic_term`= :school_academic_term WHERE `school_code`= :school_code", $params);

			$response = array('error' => 'false', 'url' => 'school', 'message' => "Academic Year Updated!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Perform The Promotion!");
	}

	echo json_encode($response);
?>

