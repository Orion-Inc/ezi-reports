<?php
	require_once 'Autoloader.php'; 
	$generate = new App(); 

	$errors = array();
	//$url = "http://app02.localhost/ezi-reports/app/auth/?recover=";

	$suffix = '?auth=forgot-password&token=';
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

				if (1==1){
					$mailTemplate = file_get_contents('../../email/password-reset.html');

					$params = array(
						'{$user}' => $school['school_name'],
						'{$verification_code}' => $verificationCode
					);
					$email = strtr($mailTemplate, $params);;
					echo $email;


					//header("Location:../../../app/auth/?auth=forgot-password&token={$token}");
				}else{
					$errors[0] = array('auth_error' => 'true', 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=forgot-password");
				}
			}
		}else if(preg_match("/[S][0-99]*/",$loginPrefix)===1){
			
		}else{
			$errors[0] = array('auth_error' => 'true', 'message' => "The Email or User Code you entered is invalid!");
			$_SESSION['ERRORS'] = $errors[0];
			header("Location:../../../app/auth/?auth=forgot-password");
		}
	}
?>



