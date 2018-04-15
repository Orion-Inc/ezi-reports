<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

	$errors = array();

	$courseParams = array( 
		'course_code' => stripslashes($_POST['course_code']),
        'course_name' => stripslashes($_POST['course_name']),
        'course_type' => stripslashes($_POST['course_type']),
        'course_description' => stripslashes($_POST['course_description'])
    );

	$transact->beginTransaction();

	try {
		$updateCourse = Database::query("UPDATE `ezi_course` SET 
            `course_type`=:course_type,
            `course_name`=:course_name,
            `course_description`=:course_description
             WHERE 
            `course_code`=:course_code", 
			$courseParams
		);

		$transact->commit();
		$response = array('error' => 'false', 'url' => 'admin-courses', 'message' => "Course Details Updated Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'admin-courses', 'message' => "An Error Occurred While Trying To Update Course.");
	}

	echo json_encode($response);
?>

