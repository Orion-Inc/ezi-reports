<a href="#" class="thumbnail"> 
    <?php
        $gender = Database::query("SELECT `student_gender` FROM `ezi_student_details` WHERE `student_code`='{$_SESSION['SESS_USER_ID']}'")[0];
        switch ($gender['student_gender']) {
            case 'male':?>
                <img alt="<?php App::show($_SESSION['SESS_USER_ID'])?>" class="avatar img-circle" src="../assets/images/users/user-male.png">
                <?php break;
            case 'female':?>
                <img alt="<?php App::show($_SESSION['SESS_USER_ID'])?>" class="avatar img-circle" src="../assets/images/users/user-female.png">
                <?php break;
            default:?>
                <?php break;
        }
    ?>
</a>