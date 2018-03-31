<?php 
	require_once ('../Autoloader.php');
	

	if (isset($_GET['school_code']) && !empty($_GET['school_code'])) {
		$school_code = $_GET['school_code'];

		echo $school_code;

		if (!empty($_FILES)) {
			$crest = file_get_contents($_FILES['school_crest']['tmp_name']);


			$params = array(
				'school_code' => $school_code,
				'school_crest' => $crest
			);

			try {
				$query = Database::query("UPDATE `ezi_school_crest` SET `school_crest`=:school_crest WHERE `school_code`= :school_code", $params);

				$response = array('error' => 'false', 'url' => 'school', 'message' => "Crest Was Changed Successfully!");
			} catch (Exception $e) {
				$response = array('error' => 'true', 'url' => 'school', 'message' => "An Error Occurred While Trying To Change Crest!");
			}

			echo json_encode($response);
		}
	}
?>

