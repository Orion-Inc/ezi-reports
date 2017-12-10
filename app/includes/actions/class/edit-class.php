<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

	$errors = array();

	$classParams = array( 
		'class_code' => stripslashes($_POST['class_code']),
		'class_name' => stripslashes($_POST['class_name']),
		'class_course' => stripslashes($_POST['class_course']),
		'class_teacher' => stripslashes($_POST['class_teacher'])
	);

	if (isset($_POST['class_subjects'])) {
		$classSubjects = $_POST['class_subjects'];

		$classSubjectsParams = array( 
			'class_code' => stripslashes($_POST['class_code']),
			'class_subjects' => addslashes(implode(",", $classSubjects))
		);
	}
	
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

		if (isset($classSubjects)) {
			$updateClassSubjects = Database::query("UPDATE `ezi_school_class_subject` SET 
				`class_subjects`=:class_subjects
				WHERE 
				`class_code`=:class_code", 
				$classSubjectsParams
			);
		}

		$transact->commit();
		$response = array('error' => 'false', 'url' => 'class', 'message' => "Class Details Updated Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'class', 'message' => "An Error Occurred While Trying To Update Class.");
	}

	echo json_encode($response);
?>

