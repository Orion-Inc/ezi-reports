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
        if(substr($data['next_class'], 0, 3) =="ALU"){
            $students = Database::query("SELECT `student_code` FROM `ezi_student_class` WHERE `student_class` = '{$data['current_class']}'");
            
            foreach ($students as $student) {
                $set_statusParams = array(
                    'school_code' => $school_code,
                    'student_code' => $student['student_code'],
                    '_status' => '0'
                );

                $set_status = Database::query(
                "UPDATE `ezi_student` SET `status`=:_status WHERE `student_code`=:student_code AND `school_code`= :school_code",
                    $set_statusParams
                );
            }
        }

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