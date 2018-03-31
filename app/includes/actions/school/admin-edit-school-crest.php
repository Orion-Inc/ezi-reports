<?php 
	require_once ('../Autoloader.php');
	

	if (isset($_GET['school_code']) && !empty($_GET['school_code'])) {
		$school_code = $_GET['school_code'];


		if (!empty($_FILES)) {
			try {

				$tempfile = $_FILES['school_crest']['tmp_name'];
				$extension = pathinfo($_FILES['school_crest']['name'],PATHINFO_EXTENSION);

				$files = glob('../../../../school_crests/'.$school_code.'{*.jpg,*.jpeg,*.gif,*.png}', GLOB_BRACE);
				$targetfile = '../../../../school_crests/'.$school_code.'.'.$extension;
				

				if (file_exists($files[0])==true) {
					if (array_map('unlink', glob('../../../../school_crests/'.$school_code.'{*.jpg,*.jpeg,*.gif,*.png}'))) {
						move_uploaded_file($tempfile,$targetfile);
					}
				}else{
					move_uploaded_file($tempfile,$targetfile);
				}
				$response = array('error' => 'false', 'url' => 'admin-school', 'message' => "Crest Changed Successfully!\n<small>Change will take effect next time you log in.</small>!");
			} catch (Exception $e) {
				$response = array('error' => 'true', 'url' => 'admin-school', 'message' => "An Error Occurred While Trying To Change Crest!");
			}

			echo json_encode($response);
		}
	}
?>

