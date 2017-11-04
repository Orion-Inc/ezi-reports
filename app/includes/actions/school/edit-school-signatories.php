<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 


	if (!empty($_FILES)) {
		$signature_type = $_GET['t'];
		$school_code = $_SESSION['SESS_USER_ID'];
		$signature = file_get_contents($_FILES['school_signature']['tmp_name']);

		$params = array( 
			'school_code' => $school_code,
			'signature' => $signature
		);

		try {
			switch ($signature_type) {
			 	case 'head-signature':
			 		$query = Database::query("UPDATE `ezi_school_signatories` SET `school_head`= :signature WHERE `school_code`= :school_code", $params);
			 		break;
			 	
			 	case 'ass-head-signature':
			 		$query = Database::query("UPDATE `ezi_school_signatories` SET `school_ass_head`= :signature WHERE `school_code`= :school_code", $params);
			 		break;

			 	case 'account-signature':
			 		$query = Database::query("UPDATE `ezi_school_signatories` SET `school_accountant`= :signature WHERE `school_code`= :school_code", $params);
			 		break;
			} 

			$response = array('error' => 'false', 'url' => 'school', 'message' => "Signature Was Changed Successfully!");
		} catch (Exception $e) {
			$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Change Signature!");
		}

		echo json_encode($response);
	}
?>

