<?php
	session_start();
	
	spl_autoload_register(function ($class_name){
        if (file_exists('../../Classes/'.$class_name.'.Class.php')) {
            require_once '../../Classes/'.$class_name.'.Class.php';
        }else if (file_exists('../../Controllers/'.$class_name.'.php')) {
            require_once '../../Controllers/'.$class_name.'.php';
        }
    });
?>