<?php
    session_start();
    require '../../Classes/Database.Class.php';
    require '../../Controllers/App.php'; 
    require '../../Classes/School.Class.php'; 
    require '../../Classes/Student.Class.php'; 
    $errors = array();


    $data = array('data' => array());

    $student_options = '';
    
    try {
        $studentsArray = Student::getStudents($_SESSION['SESS_USER_ID']);
        if (!empty($studentsArray)) {
            foreach ($studentsArray as $student) {
                $view = '<a href="" class="btn btn-outline btn-success btn-sm"><i class="ti-eye"></i></a>';
                $edit = '<a href="" class="btn btn-outline btn-primary btn-sm"><i class="ti-pencil"></i></a>';
                $delete = '<a href="" class="btn btn-outline btn-danger btn-sm"><i class="ti-trash"></i></a>';
                $student_options = '<div role="group" class="btn-group">'.$view.$edit.$delete.'</div>';

                $dob = date_format(date_create(Student::getStudent($student['student_code'],'dob')),"j F Y");
                $course = Student::getStudent($student['student_code'],'course');
                $updated_at = date_format(date_create(Student::getStudent($student['student_code'],'updated_at')),"j F Y  h:ia");


                $data['data'][] = array(
                    '<a href="#">'.$student['student_code'].'</a>',
                    $student['student_name'],
                    $dob,
                    ucwords(Student::getStudent($student['student_code'],'gender')),
                    ucwords(Student::getStudent($student['student_code'],'status')),
                    ucwords(Student::getStudent($student['student_code'],'house')),
                    $course,
                    Student::getStudent($student['student_code'],'class'),
                    $student_options,
                    $updated_at
                );
            }
        }
    } catch (Exception $e) {
        echo json_encode($errors);
    }
    
    echo json_encode($data);

?>
