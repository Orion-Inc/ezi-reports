<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

	$errors = array();
	$data = $_POST;
	$classSubjects = $data['class_subjects'];

	$school_code = $_SESSION['SESS_USER_ID'];
	$group_code = App::genRandomString(10, $school_code);
	

	for ($i=0; $i < sizeof($data['class_name']); $i++) { 
		$a = $i+1;
		$classes[] = array(
			'class_group' => $group_code,
			'identifier' => $a,
			'class_name' => $data['class_name']['form_'.$a],
			'class_teacher' => $data['class_teacher']['form_'.$a],
			'class_code' => $data['class_code']['form_'.$a],
			'class_course' => $data ['class_course'],
			'school_code' => $school_code
		);
	}


	foreach ($classes as $class) {
		$classParams = array(
			'class_code' => $class['class_code'],
			'class_group' => $class['class_group'],
			'identifier' => $class['identifier'],
			'class_name' => $class['class_name'],
			'class_teacher' => $class['class_teacher'],
			'class_course' => $class['class_course'],
			'school_code' => $class['school_code']
		);

		$classSubjectsParams = array(
			'class_code' => $class['class_code'],
			'class_subjects' => addslashes(implode(",", $classSubjects))
		);

		$transact->beginTransaction();

		try {
			$addClass = Database::query(
			"INSERT INTO `ezi_school_class`(
				`class_code`, 
				`class_group`, 
				`identifier`, 
				`class_name`, 
				`class_teacher`, 
				`class_course`, 
				`school_code`) 
				VALUES (
				:class_code,
				:class_group,
				:identifier,
				:class_name,
				:class_teacher,
				:class_course,
				:school_code
				)",
				$classParams
			);

			$addClassSubjects = Database::query(
				"INSERT INTO `ezi_school_class_subject`(
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
	}

	echo json_encode($response);

?>

