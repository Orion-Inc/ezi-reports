<?php
	require_once 'Autoloader.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';

	$transact = Database::connect();
	$generate = new App();
	$mail = new PHPMailer(true);

	//Server settings                               
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.ipage.com';                       // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'sms@orionic.tech';                 // SMTP username
	$mail->Password = 'sms@Oriondope$1000';               // SMTP password
	// $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$errors = array();

	$dir = '/ezi-reports/app';
	$code_email = stripslashes($_POST['code_email']);
	$loginPrefix = substr($code_email,0,3);


	if (empty($code_email)) {
		$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'message' => "Please enter Your Email Address or User Code");
		$_SESSION['ERRORS'] = $errors[0];
		header("Location:../../../app/auth/?auth=forgot-password");
	} else {
		if (filter_var($code_email, FILTER_VALIDATE_EMAIL) || $loginPrefix === 'SCH') {
			$isEmailValid = Database::query("SELECT `school_code`,`school_name`,`school_email` FROM `ezi_school` WHERE (`school_email`='{$code_email}' OR `school_code`='{$code_email}')")[0];

			if (empty($isEmailValid)) {
				$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'message' => "The Email or User Code you entered is invalid!");
				$_SESSION['ERRORS'] = $errors[0];
				header("Location:../../../app/auth/?auth=forgot-password");
			} else {
				$school = $isEmailValid;
				$token = $generate->token_generator();
				$verificationCode = $generate->randomString(8);

				$mailTemplate = file_get_contents('../../templates/emails/password-reset.html');

				$params = array(
					'{user}' => $school['school_name'],
					'{verification_code}' => $verificationCode,
					'{ezi_email}' => '',
					'{orion_website}' => '',
					'{ezi_website}' => '',
					'{orion_logo}' => $_SERVER['HTTP_ORIGIN'] . $dir . '/assets/images/logo-dark.png',
					'{main_logo}' => $_SERVER['HTTP_ORIGIN'] . $dir . '/assets/images/logo-2.png'
				);
				$body = strtr($mailTemplate, $params);

			
				$transact->beginTransaction();
				try {
					//Recipients
					$mail->setFrom('sms@orionic.tech', 'eziReports.');
					$mail->addAddress($school['school_email'], $school['school_name']);
					$mail->addReplyTo('sms@orionic.tech', 'eziReports');
					
					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'Recover Password';
					$mail->Body = $body;
					$mail->AltBody = 'To recover your password, please enter this code: ' . $verificationCode;

					$mail->send();

					$verifyParams = array(
						'user_code' => $school['school_code'],
						'token' => $token,
						'verification_code' => $verificationCode
					);

					$verifyQuery = Database::query(
						"INSERT INTO `ezi_user_password_resets`(
							`user_code`, 
							`token`, 
							`verification_code`
							) VALUES (
								:user_code,
								:token,
								:verification_code
							)",
						$verifyParams
					);

					$transact->commit();
					header("Location:../../../app/auth/?auth=forgot-password&x={$school['school_code']}&y={$token}&t=email");
				} catch (PDOException $e) {
					$transact->rollBack();
					$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'error_msg' => $e->getMessage(), 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=forgot-password");
				}
			}
		}else if(preg_match("/[S][0-99]*/",$loginPrefix)===1){
			$isStudentValid = Database::query("SELECT `student_code`,`student_name` FROM `ezi_student` WHERE `student_code` ='{$code_email}'")[0];

			if (empty($isStudentValid)) {
				$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'message' => "The User Code you entered is invalid!");
				$_SESSION['ERRORS'] = $errors[0];
				header("Location:../../../app/auth/?auth=forgot-password");
			} else {
				$isTelValid = Database::query("SELECT `guardian_telephone`,`guardian_email` FROM `ezi_student_guardian` WHERE `student_code` ='{$code_email}'")[0];

				if (empty($isTelValid)) {
					$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
					$_SESSION['ERRORS'] = $errors[0];
					header("Location:../../../app/auth/?auth=forgot-password");
				} else {
					$student = $isStudentValid;
					$token = $generate->token_generator();
					$verificationCode = $generate->randomString(8);

					$smsTemplate = file_get_contents('../../templates/sms/password-reset.text');;

					$params = array(
						'{$user}' => $student['student_name'],
						'{$verification_code}' => $verificationCode
					);
					$sms = strtr($smsTemplate, $params);
					echo $sms;
					if (1==1){
						


						//header("Location:../../../app/auth/?auth=forgot-password&x={}&y={$token}&t=sms");
					}else{
						$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'message' => "We encountered a problem while trying to send you a verification code.\nPlease try again or Contact Us.");
						$_SESSION['ERRORS'] = $errors[0];
						//header("Location:../../../app/auth/?auth=forgot-password");
					}
				}
			}			
		}else{
			$errors[0] = array('auth_error' => 'true', 'type' => 'error', 'message' => "The Email or User Code you entered is invalid!");
			$_SESSION['ERRORS'] = $errors[0];
			//header("Location:../../../app/auth/?auth=forgot-password");
		}
	}
?>



