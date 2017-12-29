<?php
	require_once 'Autoloader.php'; 

	$generate = new App();
	$errors = array();

	$eziAccountcode = stripslashes($_POST['eziAccountcode']);
	$access_key  = stripslashes($_POST['access_key']);

	$loginPrefix = substr($eziAccountcode,0,3);

	switch ($loginPrefix) {
		case 'ezi':
				$_SESSION['SESS_IS_AUTH'] = true;
				$_SESSION['SESS_USER_TYP'] = 'eziAdmin';
				$_SESSION['SESS_TOKEN'] = '';

				header("Location:../../../app/admin/?token=".$_SESSION['SESS_TOKEN']);
			break;

		case 'SCH':
				$school_code = $eziAccountcode;
				$school = School::getSchool($school_code,'school_id');

				if(!empty($school)) {
					$schoolParams = array( 
						'student_code' => $school_code,
						'access_key' => sha1($access_key)
					);


					$_school = Database::query("SELECT `school_code` FROM `ezi_school_access_key` WHERE 
						`school_code`='{$schoolParams['student_code']}'  
						AND 
						`access_key`='{$schoolParams['access_key']}'"
					);

					if (!empty($_school[0])) {
						$token = $generate->token_generator();

						$params = array( 
							'school_code' => stripslashes($_POST['eziAccountcode']), 
							'token' => $token
						);


						try {
							$query = Database::query("UPDATE `ezi_school_access_key` SET `token`= :token WHERE `school_code` = :school_code", $params);

							$_SESSION['SESS_IS_AUTH'] = true;
							$_SESSION['SESS_USER_TYP'] = 'school';
							$_SESSION['SESS_USER_ID'] = School::getSchool($school_code,'school_code');
							$_SESSION['SESS_SCHOOL_PREFIX'] = School::getSchool($school_code,'school_prefix');
							$_SESSION['SESS_SCHOOL_NAME'] = School::getSchool($school_code,'school_name');
							$_SESSION['SESS_SCHOOL_TYP'] = School::getSchool($school_code,'school_type');
							$_SESSION['SESS_TOKEN'] = $token;

							header("Location:../../../app/app");
						} catch (Exception $e) {
							$errors[0] = array('auth_error' => 'true', 'message' => "An Error Occured!\nPlease try again or Contact Us.");
							$_SESSION['ERRORS'] = $errors[0];
							header("Location:../../../app/auth/?auth=login");
						}
					} else {
						$errors[0] = array('auth_error' => 'true', 'message' => "An Error occured while trying to verify your School Code.\nPlease try again or Contact Us.");
						$_SESSION['ERRORS'] = json_encode($errors[0]);
						header("Location:../../../app/auth/?auth=login");
					}
				}else{
					$errors[0] = array('auth_error' => 'true', 'message' => "Wrong School Code or Access Key");
					$_SESSION['ERRORS'] = json_encode($errors[0]);
					header("Location:../../../app/auth/?auth=login");
				}
				
			break;

		case 'STU':
			# code...
			break;
		
		default:
			$errors[0] = array('auth_error' => 'true', 'message' => "Please Enter Correct Credentials");
			$_SESSION['ERRORS'] = json_encode($errors[0]);
			header("Location:../../../app/auth/?auth=login");
			break;
	}
?>



