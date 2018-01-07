<?php 
	require_once ('../Autoloader.php');

	$app = new App();

	$errors = array();


	try {
		$course_code = "";
		$course_name = stripslashes($_GET['course_name']);

		$generateCoursePrefix = explode(' ', $course_name);

		if (sizeof($generateCoursePrefix) >= 2) {
            $course_prefix = strtoupper($generateCoursePrefix[0][0].$generateCoursePrefix[0][1].$generateCoursePrefix[1][0]);
        }else{
            $course_prefix = strtoupper($generateCoursePrefix[0][0].$generateCoursePrefix[0][1].$generateCoursePrefix[0][2]);
        }

        $year = substr(date('Y'),2);
        $course_number = $app->randomizer(4);

        $course_code = 'CS'.$course_prefix.$course_number;

		$response = array('error' => 'false', 'url' => 'admin-courses', 'course_code' => $course_code);
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-courses', 'message' => "");
	}

	echo json_encode($response);
?>

