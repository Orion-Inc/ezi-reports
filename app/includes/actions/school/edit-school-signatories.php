<?php 
	session_start();
	$signature_type = $_GET['t'];


	if (!empty($_FILES)) {
		$signature = addslashes (file_get_contents($_FILES['school_signature']['tmp_name']));

		try {
			switch ($signature_type) {
			 	case 'head-signature':
			 		# code...
			 		break;
			 	
			 	case 'ass-head-signature':
			 		# code...
			 		break;

			 	case 'account-signature':
			 		# code...
			 		break;
			} 
		} catch (Exception $e) {
			
		}
	}
	
?>

