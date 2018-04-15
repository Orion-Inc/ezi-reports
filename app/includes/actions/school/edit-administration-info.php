<?php 
	require_once ('../Autoloader.php');

	$errors = array();

	$params = array( 
		'school_code' => stripslashes($_POST['school_code']), 
		'school_head_title' => stripslashes($_POST['school_head_title']),
		'school_head_fullname' => stripslashes($_POST['school_head_fullname']), 
		'school_ass_head_title' => stripslashes($_POST['school_ass_head_title']),
		'school_ass_head_fullname' => stripslashes($_POST['school_ass_head_fullname']),
		'school_accountant_title' => stripslashes($_POST['school_accountant_title']),
		'school_accountant_fullname' => stripslashes($_POST['school_accountant_fullname'])
	);

	try {
		//Create query
			$query = Database::query("UPDATE `ezi_school_administration` SET `school_head_title`= :school_head_title,`school_head_fullname`= :school_head_fullname,`school_ass_head_title`= :school_ass_head_title,`school_ass_head_fullname`= :school_ass_head_fullname,`school_accountant_title`= :school_accountant_title,`school_accountant_fullname`= :school_accountant_fullname WHERE `school_code`= :school_code", $params);

			$response = array('error' => 'false', 'url' => 'school', 'message' => "Your School Administration Information Has Been Updated Successfully!");
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Perform The Update!");
	}

	echo json_encode($response);
?>

