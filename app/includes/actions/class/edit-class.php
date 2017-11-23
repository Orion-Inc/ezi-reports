<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 
	$transact = Database::connect();

	$errors = array();

	$classParams = array( 
		'class_code' => stripslashes($_POST['class_code']),
		'class_name' => stripslashes($_POST['class_name']),
		'class_course' => stripslashes($_POST['class_course']),
		'class_teacher' => stripslashes($_POST['class_teacher'])
	);

	$transact->beginTransaction();

	try {
		$updateClass = Database::query("UPDATE `ezi_school_class` SET 
			`class_name`=:class_name,
			`class_teacher`=:class_teacher,
			`class_course`=:class_course
			WHERE 
			`class_code`=:class_code", 
			$classParams
		);

		$transact->commit();
		$response = array('error' => 'false', 'url' => 'class', 'message' => "Class Details Updated Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'class', 'message' => "An Error Occurred While Trying To Update Class.");
	}

	echo json_encode($response);
?>

