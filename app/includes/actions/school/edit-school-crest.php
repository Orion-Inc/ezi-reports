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

		} catch (Exception $e) {
			
		}
	}
	
?>

