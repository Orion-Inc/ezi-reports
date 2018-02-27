<?php
	require_once 'Autoloader.php'; 

	$generate = new App();
	$errors = array();
	$prefix = 'app/?token=';

	$eziAccountcode = stripslashes($_POST['eziAccountcode']);
	$access_key  = stripslashes($_POST['access_key']);


	$loginPrefix = substr($eziAccountcode,0,3);

	switch ($loginPrefix) {
		case 'ezi':
				$adminParams = array( 
					'username' => $eziAccountcode,
					'access_key' => sha1($access_key)
				);

				$_admin = Database::query("SELECT `id`,`username` FROM `ezi_admin` WHERE 
					`username`='{$adminParams['username']}'  
					AND 
					`password`='{$adminParams['access_key']}'"
				);

				if (!empty($_admin[0])) {
					$id = $_admin[0]['id'];
					$username = $_admin[0]['username'];
					$token = $generate->token_generator();

					$params = array( 
						'id' => $id, 
						'token' => $token
					);

					try {
						$query = Database::query("UPDATE `ezi_admin` SET `token`= :token WHERE `id` = :id", $params);

						$_SESSION['SESS_IS_AUTH'] = true;
						$_SESSION['SESS_USER_TYP'] = 'eziAdmin';
						$_SESSION['SESS_USER_ID'] = $id;
						$_SESSION['SESS_USER_NAME'] = $username;
						$_SESSION['SESS_TOKEN'] = $token;

						header("Location:../../{$prefix}{$token}");
					} catch (Exception $e) {
						$errors[0] = array('auth_error' => 'true', 'message' => "An Error Occured!\nPlease try again or Contact Us.");
						$_SESSION['ERRORS'] = $errors[0];
						header("Location:../../../app/auth/?auth=login");
					}
				} else{
					$errors[0] = array('auth_error' => 'true', 'message' => "Wrong Username or Password!");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=login");
				}	
			break;

		case 'SCH':
				$school_code = $eziAccountcode;
				$school = School::getSchool($school_code,'school_id');

				if(!empty($school)) {
					$schoolParams = array( 
						'school_code' => $school_code,
						'access_key' => sha1($access_key)
					);


					$_school = Database::query("SELECT `user_code` FROM `ezi_users` WHERE 
						`user_code`='{$schoolParams['school_code']}'  
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
							$query = Database::query("UPDATE `ezi_users` SET `token`= :token WHERE `user_code` = :school_code", $params);

							$_SESSION['SESS_IS_AUTH'] = true;
							$_SESSION['SESS_USER_TYP'] = 'school';
							$_SESSION['SESS_USER_ID'] = School::getSchool($school_code,'school_code');
							$_SESSION['SESS_SCHOOL_PREFIX'] = School::getSchool($school_code,'school_prefix');
							$_SESSION['SESS_SCHOOL_NAME'] = School::getSchool($school_code,'school_name');
							$_SESSION['SESS_SCHOOL_TYP'] = School::getSchool($school_code,'school_type');
							$_SESSION['SESS_TOKEN'] = $token;

							header("Location:../../{$prefix}{$token}");
						} catch (Exception $e) {
							$errors[0] = array('auth_error' => 'true', 'message' => "An Error Occured!\nPlease try again or Contact Us.");
							$_SESSION['ERRORS'] = $errors[0];
							header("Location:../../../app/auth/?auth=login");
						}
					} else {
						$errors[0] = array('auth_error' => 'true', 'message' => "Wrong Access Code Provided!");
						$_SESSION['ERRORS'] = $errors[0];
						header("Location:../../../app/auth/?auth=login");
					}
				}else{
					$errors[0] = array('auth_error' => 'true', 'message' => "Wrong School Code!");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=login");
				}
				
			break;

		case preg_match("/[S][0-99]*/",$loginPrefix)===1:
				$student_code = $eziAccountcode;
				$student = Student::getStudent($student_code,'student_code');

				if(!empty($student)) {
					$studentParams = array( 
						'student_code' =>$student_code,
						'access_key' => sha1($access_key)
					);

					$_student = Database::query("SELECT `user_code` FROM `ezi_users` WHERE 
						`user_code`='{$studentParams['student_code']}'  
						AND 
						`access_key`='{$studentParams['access_key']}'"
					);

					if (!empty($_student[0])) {
						$token = $generate->token_generator();

						$params = array( 
							'student_code' => $student_code, 
							'token' => $token
						);

						try {
							$query = Database::query("UPDATE `ezi_users` SET `token`= :token WHERE `user_code` = :student_code", $params);

							$_SESSION['SESS_IS_AUTH'] = true;
							$_SESSION['SESS_USER_TYP'] = 'student';
							$_SESSION['SESS_USER_ID'] = Student::getStudent($student_code,'student_code');
							$_SESSION['SESS_STUDENT_NAME'] = Student::getStudent($student_code,'student_name');
							$_SESSION['SESS_TOKEN'] = $token;

							header("Location:../../{$prefix}{$token}");
						} catch (Exception $e) {
							$errors[0] = array('auth_error' => 'true', 'message' => "An Error Occured!\nPlease try again or Contact Us.");
							$_SESSION['ERRORS'] = $errors[0];
							header("Location:../../../app/auth/?auth=login");
						}
					}else{
						$errors[0] = array('auth_error' => 'true', 'message' => "Wrong Access Code Provided!");
						$_SESSION['ERRORS'] = $errors[0];
						header("Location:../../../app/auth/?auth=login");
					}

				}else {
					$errors[0] = array('auth_error' => 'true', 'message' => "Wrong Student Code!");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=login");
				}

			break;
		
		default:
			$errors[0] = array('auth_error' => 'true', 'message' => "Please Enter Correct Credentials");
			$_SESSION['ERRORS'] = $errors[0];
			header("Location:../../../app/auth/?auth=login");
			break;
	}
?>



