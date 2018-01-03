<?php
	require_once 'Autoloader.php';  

	$errors = array();
	//$url = "http://app02.localhost/ezi-reports/app/auth/?recover=";

	$suffix = '?auth=forgot-password&token=';
	$email = stripslashes($_POST['school_email']);

	if (empty($email)) {
		$errors[0] = array('auth_error' => 'true', 'message' => "Please enter Your School's Email Address");
		$_SESSION['ERRORS'] = $errors[0];
		header("Location:../../../app/auth/?auth=forgot-password");
	} else {
		$isEmailValid = Database::query("SELECT `school_code`,`school_email` FROM `ezi_school` WHERE `school_email`='{$email}'")[0];
		if (empty($isEmailValid)) {
			$errors[0] = array('auth_error' => 'true', 'message' => "The Email your entered is invalid!");
			$_SESSION['ERRORS'] = $errors[0];
			header("Location:../../../app/auth/?auth=forgot-password");
		} else {
			
		}
		
		print_r($isEmailValid);
	}
?>



