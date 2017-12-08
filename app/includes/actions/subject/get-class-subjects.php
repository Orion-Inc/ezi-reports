<?php
	require_once ('../Autoloader.php');
	$get = new Course();

	$errors = array();

	$course_code = $_GET['course_code'];

    if (isset($_GET['class_code']) && !empty($_GET['class_code'])) {
    	try {
			
		} catch (PDOException $e) {
			$return_arr = array('id' => $i,'text' => '<a href="javascript:page(\'class\')">Reload Page</a>');
		}
    }elseif (!isset($_GET['class_code'])) {
    	try {
			$subjects = $get->get("getSubjects",$course_code);
			
			$subjectArray = array();
			$i = 1;

			if (!empty($subjects)) {
				foreach ($subjects as $subject) {
					$subjectArray[] = array(
						'id' => utf8_encode($i),
						'text' => utf8_encode($subject['subject_name']),
						'value' => utf8_encode($subject['subject_code'])
					);
					
					$i++;
				}

				$return_arr = $subjectArray;
			}else{
				$return_arr = array('id' => $i,'text' => 'No subjects found!');
			}
		} catch (PDOException $e) {
			$return_arr = array('id' => $i,'text' => '<a href="javascript:page(\'class\')">Reload Page</a>');
		}
    }

	echo json_encode(array('results' => $return_arr, 'paginate' => array('more' => true)));
?>