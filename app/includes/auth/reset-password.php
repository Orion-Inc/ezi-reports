<?php
	require_once 'Autoloader.php';  

	$errors = array();
	$url = "http://app02.localhost/ezi-reports/app/app/?recover=";

	$school_code = stripslashes($_POST['school_code']);

	if (empty($school_code)) {
		$response = array('error' => 'true', 'message' => 'Please enter Your School Code!');
	} else {

		$school = Database::query("SELECT `school_id` FROM `ezi_school` WHERE (`school_code`='$school_code' OR `school_email`='$school_code')")[0];


		if($school['school_id']) {
			$_school = Database::query("SELECT `school_email` FROM `ezi_school` WHERE `school_id`='{$school['school_id']}'")[0];

			if ($_school['school_email']) {
				$key = Database::query("SELECT `access_key` FROM `ezi_school_access_key` WHERE `school_code` = '$school_code'")[0];
				$recover_url = $url.$key['access_key'];

				$response = array('error' => 'false', 'url' => '?verify');
			} else {
				$response = array('error' => 'true', 'message' => "An Error occured while trying to verify your School Code.\nPlease try again or Contact Us.");
			}
		}else{
			$response = array('error' => 'true', 'message' => "Wrong School Code!");
		}
	}
	

	

	//echo json_encode($response);
?>



