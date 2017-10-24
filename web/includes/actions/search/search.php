<?php 
    session_start();
    require '../../Classes/Database.Class.php'; 

    $errors = array();
    $dataArray = array();

    if (empty($_POST['q'])) {
        header("Location: ../../../browse/");
    }else{
        $getSchool = addslashes($_POST['q']);

        try {
            //Create query
                $school_code = Database::query("SELECT `school_code` FROM `ezi_school` WHERE `school_name` = '{$getSchool}'");
                $school_code = addslashes($school_code[0]['school_code']);

                header("Location: ../../../?login={$school_code}");
        } catch (Exception $e) {
            header("Location: ../../../browse/");
        }
    }
?>
