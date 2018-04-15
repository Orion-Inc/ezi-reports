<?php 
	require_once ('../Autoloader.php');

	$app = new App();

	$errors = array();


	try {
		$subject_code = "";
		$subject_name = stripslashes($_GET['subject_name']);

		$generateSubjectPrefix = explode(' ', $subject_name);

		if (sizeof($generateSubjectPrefix) >= 2) {
            $subject_prefix = strtoupper($generateSubjectPrefix[0][0].$generateSubjectPrefix[0][1].$generateSubjectPrefix[1][0]);
        }else{
            $subject_prefix = strtoupper($generateSubjectPrefix[0][0].$generateSubjectPrefix[0][1].$generateSubjectPrefix[0][2]);
        }

        $year = substr(date('Y'),2);
        $subject_number = $app->randomizer(4);

        $subject_code = 'SJ'.$subject_prefix.$subject_number;

		$response = array('error' => 'false', 'url' => 'admin-subjects', 'subject_code' => $subject_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-subjects', 'message' => "");
	}

	echo json_encode($response);
?>

