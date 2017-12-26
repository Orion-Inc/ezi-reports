<?php
    require_once ('../Autoloader.php');
    $get = new Database();

    $errors = array();


    $data = array('data' => array());

    $course_options = '';
    
    try {
        $courseArray = $get->query("SELECT * FROM `ezi_course`");
        if (!empty($courseArray)) {
            foreach ($courseArray as $course) {
                $view = '<button class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#admin-view-course-modal" data-course="'.$course['course_code'].'"><i class="ti-eye"></i></button>';

                $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#admin-edit-course-modal" data-course="'.$course['course_code'].'"><i class="ti-pencil"></i></button>';

                $delete = '<button class="btn btn-outline btn-danger btn-sm" onclick="deleteCourse(\''.addslashes($course['course_code']).'\',\''.addslashes($course['course_name']).'\')"><i class="ti-trash"></i></button>';
                $course_options = '<div role="group" class="btn-group">'.$view.$edit.$delete.'</div>';

                $course_code = '<a href="#">'.$course['course_code'].'</a>';
                $course_name = ucwords($course['course_name']);
                $course_prefix = (!empty($course['course_prefix'])) ? $course['course_prefix'] : "-";
                $course_description = '<a href="#" data-toggle="popover" data-trigger="focus" title="Course Description" data-content="">View</a>';
                $course_type = ucwords($course['course_type']);

                $data['data'][] = array(
                    $course_code,
                    $course_name,
                    $course_prefix,
                    $course_type,
                    $course_description,
                    $course_options           
                );
            }
        }
    } catch (Exception $e) {
        echo json_encode($errors);
    }
    
    echo json_encode($data);

?>
