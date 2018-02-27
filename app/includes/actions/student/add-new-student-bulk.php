<?php
    require_once ('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();

	$errors = array();

	function generateCode($value){
		$student_code = "";
		$school_prefix = $_SESSION['SESS_SCHOOL_PREFIX'];
		$student_name = $value;

		$generateStudentPrefix = explode(' ', $student_name);

		if (sizeof($generateStudentPrefix) >= 2) {
			$student_prefix = strtoupper($generateStudentPrefix[0][0].$generateStudentPrefix[1][0]);	
		}else{
			$student_prefix = strtoupper($generateStudentPrefix[0][0].$generateStudentPrefix[0][1]);
		}

		$year = substr(date('Y'),2);
		$student_number = App::randomizer(4);

		$student_code = 'S'.$year.'/'.$school_prefix.'/'.$student_prefix.$student_number;

		return $student_code;
	}

	if (!empty($_FILES['bulk_student_file']) && isset($_FILES['bulk_student_file']['name'])) {
		$csv = $_FILES['bulk_student_file']['tmp_name'];

		$file = fopen($csv,"r");
		$count = count(file($csv, FILE_SKIP_EMPTY_LINES));
		$i = 0;

		while (!feof($file)) {
			$data = fgetcsv($file);
			$student_code = generateCode($data[0]);

			$studentParams = array( 
                'student_code' => $student_code,
                'student_name' => $data[0],
                'school_code' => $_SESSION['SESS_USER_ID']
            );
        
            $student_detailsParams = array( 
                'student_code' => $student_code,
                'student_dob' => $data[1],
                'student_gender' => $data[2],
                'student_class' => $data[3],
                'student_status' => $data[4],
                'student_house' => $data[5]
            );
        
            $student_guardian_infoParams = array( 
                'student_code' => $student_code,
                'guardian_name' => $data[6],
                'guardian_relationship' => $data[7],
                'guardian_occupation' => $data[8],
                'guardian_email' => $data[9],
                'guardian_telephone' => $data[10]
            );

			$transact->beginTransaction();

			try {
				$addStudent = Database::query("INSERT INTO `ezi_student`(
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

				$addStudentDetails = Database::query("INSERT INTO `ezi_student_details`(
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

				$addGuardianInfo = Database::query("INSERT INTO `ezi_student_guardian`(
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

				$response = array('error' => 'false');
			} catch (PDOException $e) {
				$transact->rollBack();
				$errors[] = $e->getMessage();
				$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'student', 'message' => "An Error Occurred While Trying To Create Bulk Entry!");
			}
			$i++;
			$response = array('error' => 'false', 'total' => $count, 'current' => $i);
		}
		
	}else{
		$response = array('error' => 'true', 'url' => 'student', 'message' => "An Error Occurred! Please <a href=\"javascript:page('student')\" data-dismiss=\"modal\">Try again.</a>");
	}


	echo json_encode($response);

?>