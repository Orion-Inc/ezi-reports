<?php
    require_once ('../Autoloader.php');
    $get = new Database();

    $errors = array();


    $data = array('data' => array());

    $subject_options = '';
    
    try {
        $subjectArray = $get->query("SELECT * FROM `ezi_subjects`");
        if (!empty($subjectArray)) {
            foreach ($subjectArray as $subject) { 
                $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#admin-edit-subject-modal" data-subject="'.$subject['subject_code'].'"><i class="ti-pencil"></i></button>';
                $delete = '<button class="btn btn-outline btn-danger btn-sm" onclick="deleteSubject(\''.addslashes($subject['subject_code']).'\',\''.addslashes($subject['subject_name']).'\')"><i class="ti-trash"></i></button>';
                
                $subject_options = '<div role="group" class="btn-group">'.$edit.$delete.'</div>';

                $subject_code = '<a href="#">'.$subject['subject_code'].'</a>';
                $subject_name = ucwords($subject['subject_name']);
                $course_name = ucwords(Course::getCourse($subject['course_code'],'course_name','eziCourse'));

                $data['data'][] = array(
                    $subject_code,
                    $subject_name,
                    $course_name,
                    $subject_options           
                );
            }
        }
    } catch (Exception $e) {
        echo json_encode($errors);
    }
    
    echo json_encode($data);

?>
