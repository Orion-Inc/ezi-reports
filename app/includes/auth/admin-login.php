<?php
	session_start();
	require_once '../Classes/Database.Class.php'; 
	require_once '../Controllers/App.php'; 
	require_once '../Classes/School.Class.php'; 


	$_SESSION['SESS_IS_AUTH'] = true;
	$_SESSION['SESS_USER_TYP'] = 'eziAdmin';
	

	$response = array('error' => 'false', 'url' => '../admin/');

	echo json_encode($response);
?>



