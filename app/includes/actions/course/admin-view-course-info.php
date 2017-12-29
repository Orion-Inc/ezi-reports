<?php 
	require_once ('../Autoloader.php'); 
	$get = new Database();

	$errors = array();
	$_course_code = $_POST['course_code'];

	try {
		$courseArray = $get->query("SELECT * FROM `ezi_course` WHERE `course_code`='{$_course_code}'");
		$course = $courseArray[0];

			$course_code = $course['course_code'];
			$course_name = ucwords($course['course_name']);
			$course_type = ucwords($course['course_type']);
			$course_prefix = (empty($course['course_prefix'])) ? "Prefix not Available" : ucwords($course['course_prefix']);

			$courseDetails = '<tr>
	                            <td colspan="1">Course Code:</td>
	                            <td><strong>'.$course_code.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Course Name:</td>
	                            <td><strong>'.$course_name.' ('.$course_prefix.')</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Course Type:</td>
	                            <td><strong>'.$course_type.'</strong></td>
	                        </tr>';


	    	
	        $subjectArray = $get->query("SELECT `subject_name`,`subject_code` FROM `ezi_subjects` WHERE `course_code`='{$course_code}'");
	        $subjectList = "";
			$coreSubjects = "<a href=\"#\">Auto Selected.</a>";

			foreach ($subjectArray as $subject) {
				$subjectList .= "<li><a href=\"#\" data-subjectCode=\"".$subject['subject_code']."\">".$subject['subject_name']."</a></li>";
			}

			$courseSubjects = '
							<tr>
                                <td colspan="2">Core Subjects: '.$coreSubjects.'</td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                	Elective Subjects 
                                	<small>
                                		<a href="#" data-toggle="modal" data-target="#admin-add-subject-modal" data-course="'.$course_code.'">Add Subject</a>
                                	</small>
                                </td>
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
								<a href="#" class="btn btn-outline btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#admin-edit-course-modal" data-course="'.$course_code.'">
									<i class="ti-pencil"></i> Edit
								</a>
							</div>';
			$course_details = $tableHeader.$courseDetails.'<tr><td colspan="2"><hr></td></tr>'.$courseSubjects.$tableFooter.$editButton;

			$response = array(
					'error' => 'false', 
					'url' => 'admin-courses', 
					'course' => $course_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'admin-courses', 'message' => "An Error Occurred While Trying To Retrieve Course Information!");
	}

	

	echo json_encode($response);
?>