<?php
	require_once 'Autoloader.php';  

	$errors = array();
	//$url = "http://app02.localhost/ezi-reports/app/auth/?recover=";

	$suffix = '?auth=forgot-password&status=';
	$email = stripslashes($_POST['school_email']);

	if (empty($email)) {
		$errors[0] = array('auth_error' => 'true', 'message' => "Please enter Your School's Email Address");
		$_SESSION['ERRORS'] = $errors[0];
		header("Location:../../../app/auth/?auth=forgot-password");
	} else {
		
		
	}
?>



