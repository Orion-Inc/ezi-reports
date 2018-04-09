<?php 
	require_once ('../Autoloader.php'); 

	$errors = array();
	$student_code = $_GET['student_code'];

	try {
		$student = Database::query("SELECT * FROM `ezi_student` WHERE `student_code` = '{$student_code}'")[0];
		$student_info = Student::getStudent($student_code,"*");
		$student_guardian_info = Student::getStudentGuardian($student_code,"*");

		$student_name = ucwords($student['student_name']);
		$dob = date_format(date_create(Student::getStudent($student_info['student_code'],'student_dob')),"j F Y");
		$gender = ucwords(Student::getStudent($student['student_code'],'student_gender'));
        $course = Course::getCourse(Student::getStudent($student_info['student_code'],'student_class'),'course_name');
        $class = Classes::getClass(Student::getStudent($student['student_code'],'student_class'),'class_name');
        $status = ucwords(Student::getStudent($student['student_code'],'student_status'));
        $house = (!empty(Student::getStudent($student['student_code'],'student_house'))) ? ucwords(Student::getStudent($student['student_code'],'student_house')) : 'Not Assigned' ;


        $guardian_name = ucwords($student_guardian_info['guardian_name']);
        $guardian_relationship = ucwords($student_guardian_info['guardian_relationship']);
        $guardian_occupation = ucwords($student_guardian_info['guardian_occupation']);
        $guardian_email = '<a href="mailto:'.$student_guardian_info['guardian_email'].'" target="_blank">'.$student_guardian_info['guardian_email'].'</a>';
        $guardian_contact = '<a href="tel:'.$student_guardian_info['guardian_telephone'].'">'.$student_guardian_info['guardian_telephone'].'</a>';

		$course = (!empty($course)) ? $course : 'Not Assigned';
		$class = (!empty($class)) ? $class : 'Not Assigned';

			$studentDetails = '
							<tr>
	                            <td colspan="1">Student Name:</td>
	                            <td><strong>'.$student_name.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Date of Birth:</td>
	                            <td><strong>'.$dob.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Gender:</td>
	                            <td><strong>'.$gender.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Course:</td>
	                            <td><strong>'.$course.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Class:</td>
	                            <td><strong>'.$class.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">Status:</td>
	                            <td><strong>'.$status.'</strong></td>
	                        </tr>
	                        <tr>
	                            <td colspan="1">House Name:</td>
	                            <td><strong>'.$house.'</strong></td>
	                        </tr>';

			$guardianDetails = '
							<tr>
                                <td colspan="1">Guardian Name:</td>
                                <td><strong>'.$guardian_name.'</strong></td>
                            </tr>
                            <tr>
                                <td colspan="1">Relationship:</td>
                                <td><strong>'.$guardian_relationship.'</strong></td>
                            </tr>
                            <tr>
                                <td colspan="1">Occupation:</td>
                                <td><strong>'.$guardian_occupation.'</strong></td>
                            </tr>
                            <tr>
                                <td colspan="1">Email:</td>
                                <td><strong>'.$guardian_email.'</strong></td>
                            </tr>
                            <tr>
                                <td colspan="1">Telephone:</td>
                                <td><strong>'.$guardian_contact.'</strong></td>
                            </tr>';


        $tableHeader = '<table class="table table-borderless table-condensed animated fadeIn"><tbody>';
		$tableFooter = '</tbody></table>';
		$editButton = '	<div class="modal-footer">
							<a href="#" class="btn btn-outline btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#edit-student-modal" data-student="'.$student_code.'">
								<i class="ti-pencil"></i> Edit
							</a>
						</div>';

        $student_details = $tableHeader.$studentDetails.'<tr><td colspan="2"><hr></td></tr>'.$guardianDetails.$tableFooter.$editButton;

			$response = array(
					'error' => 'false', 
					'url' => 'student', 
					'student' => $student_details
			);
			
	} catch (Exception $e) {
		$response = array('error' => 'true', 'url' => 'student', 'message' => "An Error Occurred While Trying To Retrieve Student's Information!");
	}

	

	echo json_encode($response);
?>