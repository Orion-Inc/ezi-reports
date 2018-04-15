<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

	$errors = array();

	$subjectParams = array( 
		'subject_code' => stripslashes($_POST['subject_code']),
        'subject_name' => stripslashes($_POST['subject_name']),
		'course_code' => stripslashes($_POST['course_code']),
		'subject_description' => stripslashes($_POST['subject_description'])
    );
    
	$transact->beginTransaction();

	try {
       $addClass = Database::query("INSERT INTO `ezi_subjects`(
           `subject_code`, 
           `subject_name`, 
           `course_code`, 
           `subject_description`) 
           VALUES (
               :subject_code,
               :subject_name,
               :course_code,
               :subject_description
            )", 
			$subjectParams
		);


		$transact->commit();
		$response = array('error' => 'false', 'url' => 'admin-subjects', 'message' => "Subject Created and Assigned Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'admin-subjects', 'message' => "An Error Occurred While Trying To Create Subject.");
	}

	echo json_encode($response);

?>

