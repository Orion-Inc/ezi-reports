<?php 
	require_once ('../Autoloader.php'); 
	$get = new Database();

	$errors = array();
	$_school_code = $_GET['school_code'];

	try {
		$schoolArray = $get->query("SELECT * FROM `ezi_school` WHERE `school_code`='{$_school_code}'");
		$school = $schoolArray[0];

		$school_code = '<a href="#">'.$school['school_code'].'</a>';
        $school_name = ucwords($school['school_name']);
        $school_prefix = (!empty($school['school_prefix'])) ? $school['school_prefix'] : "-";
        $school_location = (!empty($school['school_location'])) ? $school['school_location'] : "Not Available";
        $school_email = (!empty($school['school_email'])) ? "<a href=\"mailto:".$school['school_email']."\" target=\"_blank\">".$school['school_email']."</a>" : "Not Provided";
        $school_telephone = (!empty($school['school_telephone'])) ? "<a href=\"tel:".$school['school_telephone']."\">".$school['school_telephone']."</a>" : "Not Provided";
        $school_website = (!empty($school['school_website'])) ? "<a href=\"//".$school['school_website']."\" target=\"_blank\">".$school['school_website']."</a>" : "Not Provided";
        $school_motto = (!empty($school['school_motto'])) ? $school['school_motto'] : "Not Provided";
        $school_address = (!empty($school['school_address'])) ? $school['school_address'] : "Not Provided";

        $tableDetails = '
        					<tr>
	                            <td>School Code: <strong>'.$school_code.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td>Schoo Name: <strong>'.$school_name.' <a href="#">('.$school_prefix.')</a></strong></td>
	                        </tr>
	                        <tr>
	                            <td>Motto: <strong>'.$school_motto.'</strong></td>
	                        </tr>
	                        <tr><td><hr></td></tr>
	                        <tr>
	                            <td>Location: <strong>'.$school_location.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td>Address: <strong>'.$school_address.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td>Telephone: <strong>'.$school_telephone.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td>Email: <strong>'.$school_email.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td>Website: <strong>'.$school_website.'</strong></td>
	                        </tr>
        				';


		$tableHeader = '<table class="table table-borderless table-condensed animated fadeIn"><tbody>';
		$tableFooter = '</tbody></table>';
		$editButton = '	<div class="modal-footer">
							<a href="#" class="btn btn-outline btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#admin-edit-school-modal" data-school="'.$_school_code.'">
								<i class="ti-pencil"></i> Edit
							</a>
						</div>';


		$table = $tableHeader.$tableDetails.$tableFooter;

		$school_details = '<div class="row">
					            <div class="col-md-8">
					                '.$table.'
					            </div>
					            <div class="col-md-3 col-md-offset-1">
					            	<a href="#" class="thumbnail"> 
										<img alt="'.$_school_code.'" style="height: 180px; width: 100%; display: block;" src="'. School::getSchoolCrest($_school_code) .'">
									</a>
					            </div>
					        </div>'.$editButton;
		
	    

			$response = array(
					'error' => 'false', 
					'url' => 'admin-school', 
					'school' => $school_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-school', 'message' => "An Error Occurred While Trying To Retrieve School's Information!");
	}

	

	echo json_encode($response);
?>