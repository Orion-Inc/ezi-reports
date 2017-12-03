<?php 
	session_start();
	require '../../Classes/Database.Class.php';
	require '../../Controllers/App.php';  
	require '../../Classes/School.Class.php'; 
	require '../../Classes/Student.Class.php'; 
	require '../../Classes/Course.Class.php';

	$errors = array();
	$school_code = $_SESSION['SESS_USER_ID'];

	try {

		$count = function () use ($school_code){
		    $totalStudents = count(Student::getStudents($school_code));
		    $totalClassrooms = count(Classes::fetchClasses($school_code,"*"));

		    return  array('total-students' => $totalStudents, 'total-classrooms' => $totalClassrooms);
		};

		$pieChart = function () {
		    
		};


			$response = array(
				'error' => 'false', 
				'url' => 'dashboard', 
				'count' => $count(),
				'pieChart' => $pieChart
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'dashboard', 'message' => "Statistics Can not Be Retrieved!");
	}

	
	echo json_encode($response);
?>