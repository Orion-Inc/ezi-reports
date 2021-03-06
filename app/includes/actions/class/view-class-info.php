<?php 
	require_once ('../Autoloader.php');

	$errors = array();
	$class_code = $_GET['class_code'];

	try {
		if (Classes::getClass($class_code,'class_code') != false) {
			$class_code = $class_code;
			$class_name = Classes::getClass($class_code,'class_name');
			$class_teacher = Classes::getClass($class_code,'class_teacher');
			$class_course = Course::getCourse($class_code,'course_name');
			$class_size = Classes::getClassEnrollment($class_code);

                if ($class_size == 1) {
                    $noEnrolled = $class_size." Student Enrolled";
                } else {
                    $noEnrolled = ($class_size == 0) ? "No Students Enrolled" : $class_size." Students Enrolled" ;
                }

			$classDetails = '
							<tr>
	                            <td colspan="1">Class Code:</td>
	                            <td><strong>'.$class_code.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Class Name:</td>
	                            <td><strong>'.$class_name.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Class Teacher:</td>
	                            <td><strong>'.ucwords($class_teacher).'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Class Course:</td>
	                            <td><strong>'.$class_course.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">No. Enrolled:</td>
	                            <td><strong>'.$noEnrolled.'</strong></td>
	                        </tr>';


	        $subjectArray = Course::getClassSujects($class_code,'class_code');
			$subjectList = "";
			$coreSubjects = "";

			foreach ($subjectArray as $subject) {
				$subjectList .= "<li><a href=\"#\" data-subjectCode=\"".$subject['subject_code']."\">".$subject['subject_name']."</a></li>";
			}

			$subjects = '
							<tr>
                                <td colspan="2">Class Subjects</td>
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
									<i class="ti-pencil"></i> Edit
								</a>
							</div>';

		    $class_details = $tableHeader.$classDetails.'<tr><td colspan="2"><hr></td></tr>'.$subjects.$tableFooter.$editButton;
			
			$response = array(
				'error' => 'false', 
				'url' => 'class', 
				'class' => $class_details
			);
		}else{
			$response = array('error' => 'false', 'url' => 'class', 'class' => "<strong>Not Available.</strong>");
		}	
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'class', 'message' => "An Error Occurred While Trying To Retrieve Class Information!");
	}

	

	echo json_encode($response);
?>