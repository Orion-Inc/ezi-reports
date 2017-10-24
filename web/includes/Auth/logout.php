<?php
	//Start session
	session_start();
	
		
		if ($_SESSION['SESS_IS_AUTH'] == true) {
			unset($_SESSION['SESS_IS_AUTH']);
			unset($_SESSION['SESS_USER_ID']);
			unset($_SESSION['SESS_USERNAME']);
			unset($_SESSION['SESS_FULLNAME']);
			unset($_SESSION['SESS_USER_SLUG']);
			unset($_SESSION['SESS_USER_EMAIL']);
			unset($_SESSION['profile-banner']);

			session_destroy();
			
			if(empty($_SESSION)){
				header("Location: ../../");
			}else{
				session_destroy();
				header("Location: ../../");
			}
		}else{
			session_destroy();
			
			if(empty($_SESSION)){
				header("Location: ../../");
			}
		}	
	exit;
?>