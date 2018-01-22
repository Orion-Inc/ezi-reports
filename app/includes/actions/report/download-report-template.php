<?php
    /*
        Do some parameters checks, database data collection, etc. etc. here
    */
    // Force a download dialog on the user's browser:
    $filepath = 'file.pdf';
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Content-Length: '.filesize($filepath));
    ob_clean();
    flush();
    readfile($filepath);
    exit();
?>