<?php
    require_once ('../Autoloader.php');
    $transact = Database::connect();
    
    
	$errors = array();

    if(!empty($_FILES['bulk_student_file']['name']))
    {
        $handle = fopen($_FILES['bulk_student_file']['tmp_name'],"r");
        $count = 0;

        while(($data = fgetcsv($handle,50000,",")) !== FALSE){

            $studentParams = array( 
                'student_code' => $data[0],
                'student_name' => $data[1],
                'school_code' => $_SESSION['SESS_USER_ID']
            );
        
            $student_detailsParams = array( 
                'student_code' => $data[0],
                'student_dob' => $data[2],
                'student_gender' => $data[3],
                'student_class' => $data[4],
                'student_status' => $data[5],
                'student_house' => $data[6]
            );
        
            $student_guardian_infoParams = array( 
                'student_code' => $data[0],
                'guardian_name' => $data[7],
                'guardian_relationship' => $data[8],
                'guardian_occupation' => $data[9],
                'guardian_email' => $data[10],
                'guardian_telephone' => $data[11]
            );

            $transact->beginTransaction();
            
                try {
                    $updateStudent = Database::query("INSERT INTO `ezi_student`(
                        `student_code`,
                        `student_name`,  
                        `school_code`) 
                        VALUES (
                        :student_code,
                        :student_name,
                        :school_code
                        )", 
                        $studentParams
                    );
            
                    $updateStudentDetails = Database::query("INSERT INTO `ezi_student_details`(
                        `student_code`, 
                        `student_dob`, 
                        `student_gender`, 
                        `student_class`, 
                        `student_status`, 
                        `student_house`) 
                        VALUES (
                        :student_code,
                        :student_dob,
                        :student_gender,
                        :student_class,
                        :student_status,
                        :student_house
                        )", 
                        $student_detailsParams
                    );
            
                    $updateGuardianInfo = Database::query("INSERT INTO `ezi_student_guardian`(
                        `student_code`, 
                        `guardian_name`, 
                        `guardian_relationship`, 
                        `guardian_occupation`, 
                        `guardian_email`, 
                        `guardian_telephone`) 
                        VALUES (
                        :student_code,
                        :guardian_name,
                        :guardian_relationship,
                        :guardian_occupation,
                        :guardian_email,
                        :guardian_telephone
                        )", 
                        $student_guardian_infoParams
                    );
                    $transact->commit();
                    $count++;
                    $response = array('error' => 'false', 'url' => 'student', 'message' => "New Student Created Successfully!");
                } catch (PDOException $e) {
                    $transact->rollBack();
                    $errors[] = $e->getMessage();
                    $response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'student', 'message' => "An Error Occurred While Trying To Create Student.");
                }
             
            $count++;
            }
                
            fclose($handle);
    }
    else{

        echo "Error2";
    }




?>