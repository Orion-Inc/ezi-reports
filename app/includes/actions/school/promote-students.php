<?php
    require_once ('../Autoloader.php');
    $transact = Database::connect();

    $errors = array();
    $data = $_POST;
    $school_code = $_SESSION['SESS_USER_ID'];

    $params = array(
        'school_code' => $school_code,
        'current_class' => $data['current_class'],
        'next_class' => $data['next_class']
    );

    $transact->beginTransaction();

    try {
        $promoteClass = Database::query(
            "UPDATE `ezi_student_class`
                SET 
            `student_class`= :next_class
                WHERE 
            `student_class`= :current_class AND `school_code`= :school_code",
            $params
        );
        $transact->commit();

        $response = array('error' => 'false', 'url' => 'promote-class', 'message' => "Promotion Completed!");
    } catch (PDOException $e) {
        $transact->rollBack();
        $errors[] = $e->getMessage();
        $response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'promote-class', 'message' => "An Error Occurred While Trying To Promote Students.");
    }
    

    echo json_encode($response);
?>