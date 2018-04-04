<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

	$errors = array();
	$classSubjects = $_POST['class_subjects'];

	$classSubjectsParams = array( 
		'class_code' => '',
		'class_subjects' => addslashes(implode(",", $classSubjects))
	);

	print_r($_POST);

/*
	$transact->beginTransaction();

	try {
		$addClass = Database::query("INSERT INTO `ezi_school_class`(
			`class_code`, 
			`class_name`, 
			`class_teacher`, 
			`class_course`, 
			`school_code`) 
			VALUES (
			:class_code,
			:class_name,
			:class_teacher,
			:class_course,
			:school_code
			)", 
			$classParams
		);
		
		$addClassSubjects = Database::query("INSERT INTO `ezi_school_class_subject`(
			`class_code`, 
			`class_subjects`) 
			VALUES (
			:class_code,
			:class_subjects
			)", 
			$classSubjectsParams
		);


		$transact->commit();
		$response = array('error' => 'false', 'url' => 'class', 'message' => "Class Created Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'class', 'message' => "An Error Occurred While Trying To Create Class.");
	}

	echo json_encode($response);
*/
?>

