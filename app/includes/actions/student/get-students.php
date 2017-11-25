<?php
    require_once ('../Autoloader.php');
    $errors = array();


    $data = array('data' => array());

    $student_options = '';
    
    try {
        $studentsArray = Student::getStudents($_SESSION['SESS_USER_ID']);
        if (!empty($studentsArray)) {
            foreach ($studentsArray as $student) {
                $view = '<button class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#view-student-modal" data-student="'.$student['student_code'].'"><i class="ti-eye"></i></button>';

                $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#edit-student-modal" data-student="'.$student['student_code'].'"><i class="ti-pencil"></i></button>';

                $delete = '<button class="btn btn-outline btn-danger btn-sm" onclick="deleteStudent(\''.$student['student_code'].'\',\''.$student['student_name'].'\')"><i class="ti-trash"></i></button>';
                $subjects = '';

                $student_options = '<div role="group" class="btn-group">'.$view.$edit.$delete.'</div>';

                $student_info = Student::getStudent($student['student_code'],"*");
                $student_guardian_info = Student::getStudentGuardian($student['student_code'],"*");

                $student_name = ucwords($student['student_name']);
                $dob = date_format(date_create(Student::getStudent($student_info['student_code'],'student_dob')),"j F Y");
                $gender = ucwords(Student::getStudent($student['student_code'],'student_gender'));
                $course = Course::getCourse(Student::getStudent($student_info['student_code'],'student_class'),'course_name');
                $class = Classes::getClass(Student::getStudent($student['student_code'],'student_class'),'class_name');
                $status = ucwords(Student::getStudent($student['student_code'],'student_status'));
                $house = (!empty(Student::getStudent($student['student_code'],'student_house'))) ? ucwords(Student::getStudent($student['student_code'],'student_house')) : 'Not Assigned' ;
                $updated_at = date_format(date_create(Student::getStudent($student['student_code'],'updated_at')),"j F Y  h:ia");


                $guardian_name = ucwords($student_guardian_info['guardian_name']);
                $guardian_relationship = ucwords($student_guardian_info['guardian_relationship']);
                $guardian_occupation = ucwords($student_guardian_info['guardian_occupation']);
                $guardian_email = '<a href="mailto:'.$student_guardian_info['guardian_email'].'" target="_blank">'.$student_guardian_info['guardian_email'].'</a>';
                $guardian_contact = '<a href="tel:'.$student_guardian_info['guardian_telephone'].'">'.$student_guardian_info['guardian_telephone'].'</a>';


                $data['data'][] = array(
                    '<a href="#">'.$student['student_code'].'</a>',
                    $student['student_name'],
                    $dob,
                    $gender,
                    $status,
                    $house,
                    $course = (!empty($course)) ? $course : 'Not Assigned',
                    $class = (!empty($class)) ? $class : 'Not Assigned',
                    $student_options,
                    $updated_at,
                    '',
                    $guardian_name,
                    $guardian_relationship,
                    $guardian_occupation,
                    $guardian_contact,
                    $guardian_email
                );
            }
        }
    } catch (Exception $e) {
        echo json_encode($errors);
    }
    
    echo json_encode($data);

?>
