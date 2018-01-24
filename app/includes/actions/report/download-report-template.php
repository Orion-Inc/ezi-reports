<?php
    require_once ('../Autoloader.php');

    $class_code = addslashes($_POST['class_code']);
    $class_name = Classes::getClass($class_code,"class_name");

    $filepath = $class_name.' ('.$class_code.').csv';


    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');

 
    $data = array();


    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Content-Length: '.filesize($filepath));
    ob_clean();
    flush();
    readfile($filepath);
    exit();
?>