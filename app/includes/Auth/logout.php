<?php
	//Start session
	session_start();
	
		
		if ($_SESSION['SESS_IS_AUTH'] == true) {
			unset($_SESSION['SESS_IS_AUTH']);
			unset($_SESSION['SESS_USER_ID']);
			unset($_SESSION['SESS_SCHOOL_NAME']);
			unset($_SESSION['SESS_TOKEN']);

			session_destroy();
			
			if(empty($_SESSION)){
				header("Location: ../../app/?login");
			}else{
				session_destroy();
				header("Location: ../../app/?login");
			}
		}else{
			session_destroy();
			
			if(empty($_SESSION)){
				header("Location: ../../app/?login");
			}
		}	
	exit;
?>