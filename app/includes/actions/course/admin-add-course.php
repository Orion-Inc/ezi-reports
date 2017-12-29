<?php 
	require_once ('../Autoloader.php');
	$transact = Database::connect();

	$errors = array();
    $course_name = stripslashes($_POST['course_name']);
    $generateCoursePrefix = explode(' ', $course_name);
    
    if (sizeof($generateCoursePrefix) >= 2) {
        $course_prefix = strtoupper($generateCoursePrefix[0][0].$generateCoursePrefix[0][1].$generateCoursePrefix[1][0]);
    }else{
        $course_prefix = strtoupper($generateCoursePrefix[0][0].$generateCoursePrefix[0][1].$generateCoursePrefix[0][2]);
    }

	$courseParams = array( 
		'course_code' => stripslashes($_POST['course_code']),
        'course_name' => stripslashes($_POST['course_name']),
        'course_prefix' => $course_prefix,
		'course_type' => stripslashes($_POST['course_type']),
		'course_description' => stripslashes($_POST['course_description'])
    );
    
	$transact->beginTransaction();

	try {
       $addClass = Database::query("INSERT INTO `ezi_course`(
            `course_code`, 
            `course_type`, 
            `course_name`, 
            `course_prefix`, 
            `course_description`)
            VALUES (
                :course_code,
                :course_type,
                :course_name,
                :course_prefix,
                :course_description
			)", 
			$courseParams
		);


		$transact->commit();
		$response = array('error' => 'false', 'url' => 'admin-courses', 'message' => "Course Created Successfully!");
	} catch (PDOException $e) {
		$transact->rollBack();
		$errors[] = $e->getMessage();
		$response = array('error' => 'true', 'error_msg' => $errors[0], 'url' => 'admin-courses', 'message' => "An Error Occurred While Trying To Create Course.");
	}

	echo json_encode($response);

?>

