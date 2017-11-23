<?php
    session_start();
    require '../../Classes/Database.Class.php';
    require '../../Controllers/App.php'; 
    require '../../Classes/School.Class.php'; 
    require '../../Classes/Course.Class.php'; 
    $errors = array();


    $data = array('data' => array());

  
    
    try {
        $classArray = Classes::fetchClasses($_SESSION['SESS_USER_ID'],"*");
        if (!empty($classArray)) {
            foreach ($classArray as $class) {
                $view = '<button class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#view-class-modal" data-class="'.$class['class_code'].'"><i class="ti-eye"></i></button>';

                $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#edit-class-modal" data-class="'.$class['class_code'].'"><i class="ti-pencil"></i></button>';

                $delete = '<button class="btn btn-outline btn-danger btn-sm" onclick="deleteClass(\''.$class['class_code'].'\',\''.$class['class_name'].'\')"><i class="ti-trash"></i></button>';

                $class_options = '<div role="group" class="btn-group">'.$view.$edit.$delete.'</div>';
                $updated_at = date_format(date_create($class['updated_at']),"j F Y  h:ia");
                $class_size = Classes::getClassEnrollment($class['class_code']);

                if ($class_size == 1) {
                    $noEnrolled = $class_size." Student Enrolled";
                } else {
                    $noEnrolled = ($class_size == 0) ? "No Students Enrolled" : $class_size." Students Enrolled" ;
                }

                $data['data'][] = array(
                    '<a href="#">'.$class['class_code'].'</a>',
                    $class['class_name'],
                    Course::getCourse($class['class_code'],'course_name'),
                    ucwords($class['class_teacher']),
                    $noEnrolled,
                    '<a href="#" data-toggle="modal" data-target="#view-class-subjects-modal" data-class="'.$class['class_code'].'">View Subjects</a>',
                    $class_options
                );
            }
        }
    } catch (Exception $e) {
        echo json_encode($errors);
    }
    
    echo json_encode($data);

?>
