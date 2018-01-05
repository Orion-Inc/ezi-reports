<?php
	require_once 'Autoloader.php'; 
	$generate = new App(); 

	$errors = array();

	$prefix = '?auth=forgot-password&token=';
	$code_email = stripslashes($_POST['code_email']);
	$loginPrefix = substr($code_email,0,3);


	if (empty($code_email)) {
		$errors[0] = array('auth_error' => 'true', 'message' => "Please enter Your Email Address or User Code");
		$_SESSION['ERRORS'] = $errors[0];
		header("Location:../../../app/auth/?auth=forgot-password");
	} else {
		if (filter_var($code_email, FILTER_VALIDATE_EMAIL) || $loginPrefix === 'SCH') {
			$isEmailValid = Database::query("SELECT `school_code`,`school_name`,`school_email` FROM `ezi_school` WHERE (`school_email`='{$code_email}' OR `school_code`='{$code_email}')")[0];

			if (empty($isEmailValid)) {
				$errors[0] = array('auth_error' => 'true', 'message' => "The Email or User Code you entered is invalid!");
				$_SESSION['ERRORS'] = $errors[0];
				header("Location:../../../app/auth/?auth=forgot-password");
			} else {
				$school = $isEmailValid;
				$token = $generate->token_generator();
				$verificationCode = $generate->randomString(5);

				$mailTemplate = file_get_contents('../../templates/emails/password-reset.html');

				$params = array(
					'{$user}' => $school['school_name'],
					'{$verification_code}' => $verificationCode
				);
				$email = strtr($mailTemplate, $params);

				if (1==1){
					


					header("Location:../../../app/auth/{$prefix}{$token}&type=email");
				}else{
					$errors[0] = array('auth_error' => 'true', 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=forgot-password");
				}
			}
		}else if(preg_match("/[S][0-99]*/",$loginPrefix)===1){
			$isStudentValid = Database::query("SELECT `student_code`,`student_name` FROM `ezi_student` WHERE `student_code` ='{$code_email}'")[0];

			if (empty($isStudentValid)) {
				$errors[0] = array('auth_error' => 'true', 'message' => "The User Code you entered is invalid!");
				$_SESSION['ERRORS'] = $errors[0];
				header("Location:../../../app/auth/?auth=forgot-password");
			} else {
				$isTelValid = Database::query("SELECT `guardian_telephone` FROM `ezi_student_guardian` WHERE `student_code` ='{$code_email}'")[0];

				if (empty($isTelValid)) {
					$errors[0] = array('auth_error' => 'true', 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=forgot-password");
				} else {
					$student = $isStudentValid;
					$token = $generate->token_generator();
					$verificationCode = $generate->randomString(5);

					$smsTemplate = file_get_contents('../../templates/sms/password-reset.text');;

					$params = array(
						'{$user}' => $student['student_name'],
						'{$verification_code}' => $verificationCode
					);
					$sms = strtr($smsTemplate, $params);

					if (1==1){
						


						header("Location:../../../app/auth/{$prefix}{$token}&type=sms");
					}else{
						$errors[0] = array('auth_error' => 'true', 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
						$_SESSION['ERRORS'] = $errors[0];
						header("Location:../../../app/auth/?auth=forgot-password");
					}
				}
			}			
		}else{
			$errors[0] = array('auth_error' => 'true', 'message' => "The Email or User Code you entered is invalid!");
			$_SESSION['ERRORS'] = $errors[0];
			header("Location:../../../app/auth/?auth=forgot-password");
		}
	}
?>



