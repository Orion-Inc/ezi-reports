<?php 
	session_start();
	require '../../Classes/Database.Class.php'; 

	$errors = array();
	$dataArray = array();

	try {
		//Create query
			$school = Database::query("SELECT `school_name` FROM `ezi_school` ORDER BY `school_name` ASC");
			
			
			for ($i=0; $i < count($school); $i++) { 
				$dataArray[] = $school[$i]['school_name'];
			}
			
	} catch (Exception $e) {
		$dataArray['data'][] = array();
	}

	echo json_encode($dataArray);
?>