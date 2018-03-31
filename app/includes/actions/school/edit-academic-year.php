<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'current_academic_year' => stripslashes($_POST['current_academic_year']), 
		'academic_term' => stripslashes($_POST['academic_term'])
	);

	try {
		//Create query
			$query = Database::query("UPDATE `ezi_school_academic_year` SET `current_academic_year`=:current_academic_year,`academic_term`=:academic_term WHERE `id`= '1'", $params);

			$response = array('error' => 'false', 'url' => 'admin-dashboard', 'message' => "Your Academic Year Has Been Updated Successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-dashboard', 'message' => "An Error Occurred While Trying To Perform The Update!");
	}

	echo json_encode($response);
?>

