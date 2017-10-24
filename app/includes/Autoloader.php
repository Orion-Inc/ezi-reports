<?php
	session_start();
	
	spl_autoload_register(function ($class_name){
        if (file_exists('../includes/Classes/'.$class_name.'.Class.php')) {
            require_once '../includes/Classes/'.$class_name.'.Class.php';
        }else if (file_exists('../includes/Controllers/'.$class_name.'.php')) {
            require_once '../includes/Controllers/'.$class_name.'.php';
        }
    });
?>