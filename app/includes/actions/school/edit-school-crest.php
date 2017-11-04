<?php 
	session_start();
	
	if (!empty($_FILES)) {
		try {
			$school_code = $_SESSION['SESS_USER_ID'];

			$tempfile = $_FILES['school_crest']['tmp_name'];
			$extension = pathinfo($_FILES['school_crest']['name'],PATHINFO_EXTENSION);

			$files = glob('../../../../school_crests/'.$school_code.'{*.jpg,*.jpeg,*.gif,*.png}', GLOB_BRACE);
			$targetfile = '../../../../school_crests/'.$school_code.'.'.$extension;
			

			if (file_exists($files[0])==true) {
				if (array_map('unlink', glob("../../../../school_crests/'.$school_code.'{*.jpg,*.jpeg,*.gif,*.png}"))) {
					move_uploaded_file($tempfile,$targetfile);
				}
			}else{
				move_uploaded_file($tempfile,$targetfile);
			}
			$response = array('error' => 'true', 'url' => 'school', 'message' => "Crest Changed Successfully!\n<small>Change will take effect next time you log in.</small>!");
		} catch (Exception $e) {
			$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Change Crest!");
		}

		echo json_encode($response);
	}
	
?>

