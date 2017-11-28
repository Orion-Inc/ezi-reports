<?php
	session_start();
	require_once '../Classes/Database.Class.php'; 
	require_once '../Controllers/App.php'; 
	require_once '../Classes/School.Class.php'; 
	
	$params = array( 
		'school_code' => $_SESSION['SESS_USER_ID'], 
		'token' => NULL
	);


	try {
		$query = Database::query("UPDATE `ezi_school_access_key` SET `token`= :token WHERE `school_code` = :school_code", $params);

		unset($_SESSION['SESS_IS_AUTH']);
		unset($_SESSION['SESS_USER_ID']);
		unset($_SESSION['SESS_SCHOOL_NAME']);
		unset($_SESSION['SESS_SCHOOL_TYP']);
		unset($_SESSION['SESS_TOKEN']);
		
		session_destroy();
		header("Location: ../../auth/?login");
	} catch (Exception $e) {
		session_destroy();
		header("Location: ../../auth/?login");
	}
		
?>