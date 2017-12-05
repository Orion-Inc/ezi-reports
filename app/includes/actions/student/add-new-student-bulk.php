<?php
    require_once ('../Autoloader.php');
    $transact = Database::connect();

	$errors = array();

	if (!empty($_FILES['bulk_student_file'])) {

	}else{
		$response = array('error' => 'true', 'url' => 'student', 'message' => "An Error Occurred! Please <a href=\"javascript:page('student')\" data-dismiss=\"modal\">Try again.</a>");
	}


	echo json_encode($response);

?>