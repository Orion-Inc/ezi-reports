<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

    $errors = array();
       
    print_r($_GET);
?>