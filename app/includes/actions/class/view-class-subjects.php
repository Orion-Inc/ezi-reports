<?php 
	require_once ('../Autoloader.php');

	$errors = array();
	$class_code = $_POST['class_code'];

	try {
		if (Course::getClassSujects($class_code,'class_code') != false) {
			$subjectArray = Course::getClassSujects($class_code,'class_code');
			$subjectList = "";
			$coreSubjects = "<a href=\"#\">Auto Selected.</a>";

			foreach ($subjectArray as $subject) {
				$subjectList .= "<li><a href=\"#\" data-subjectCode=\"".$subject['subject_code']."\">".$subject['subject_name']."</a></li>";
			}

			$subjects = '
							<tr>
                                <td colspan="2">Core Subjects: '.$coreSubjects.'</td>
                            </tr>

                            <tr>
                                <td colspan="2">Elective Subjects</td>
                            </tr>
                            <tr>
                                <td colspan="2">'
                                ."<ol>".$subjectList."</ol>".
                                '</td>
                            </tr>

                        ';


		    $tableHeader = '<table class="table table-borderless table-condensed animated fadeIn"><tbody>';
			$tableFooter = '</tbody></table>';
			$editButton = '	<div class="modal-footer">
								<a href="#" class="btn btn-outline btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#edit-class-modal" data-class="'.$class_code.'">
									<i class="ti-pencil"></i> Edit Subjects
								</a>
							</div>';

		    $class_details = $tableHeader.$subjects.$tableFooter.$editButton;
			
			$response = array(
				'error' => 'false', 
				'url' => 'class', 
				'subjects' => $class_details
			);
		}else{
			$response = array('error' => 'false', 'url' => 'class', 'subjects' => "<strong>Not Available.</strong>");
		}	
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "An Error Occurred While Trying To Retrieve Class Subjects!");
	}

	

	echo json_encode($response);
?>