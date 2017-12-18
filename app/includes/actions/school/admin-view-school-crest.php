<?php 
	require_once ('../Autoloader.php'); 
	$get = new Database();

	$errors = array();
	$_school_code = $_POST['school_code'];

	try {
		
		$school_crest = '<div class="row">
					            <div class="col-md-12">
					            	<a href="#" class="thumbnail"> 
										<img alt="'.$_school_code.'" style="height: 180px; width: 100%; display: block;" src="">
									</a>
					            </div>
					        </div>';
		
	    

			$response = array(
					'error' => 'false', 
					'url' => 'admin-school', 
					'school_crest' => $school_crest
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-school', 'message' => "An Error Occurred While Trying To Retrieve School's Information!");
	}

	

	echo json_encode($response);
?>