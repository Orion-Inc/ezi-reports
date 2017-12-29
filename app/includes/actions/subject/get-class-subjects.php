<?php
	require_once ('../Autoloader.php');
	$get = new Course();

	$errors = array();


    if (isset($_GET['class_code']) && !empty($_GET['class_code'])) {
    	$class_code = $_GET['class_code'];
    	$i = 1;

    	if (isset($_GET['selected'])) {
    		$classSubjects = Course::getClassSujects($class_code);
    		$subjectArray = array();

    		if ($_GET['selected'] == "array") {
    			foreach ($classSubjects as $subject) {
					$subjectArray[] = array(
						'subject_code' => $subject['subject_code'],
						'subject_name' => $subject['subject_name']
					);
				}

				$subjects = $subjectArray;
    		} elseif ($_GET['selected'] == "list") {
    			foreach ($classSubjects as $subject) {
					$subjectList[] = "<a href=\"javascript:void(0)\">".$subject['subject_name']."</a>";
				}

    			$subjects = implode(", ", $subjectList);
    		}
    		

    		echo json_encode(array('subject_list' =>$subjects));
    		exit();
    	} else {
    		try {
				$course_code = Classes::getClass($class_code,"class_course");

				$subjects = $get->get("getSubjects",$course_code);
				$selectedSubjects = Course::getClassSujects($class_code);
				
				$subjectArray = array();
				
				if (!empty($subjects)) {
					foreach ($subjects as $subject) {
						$subjectArray[] = array(
							'id' => utf8_encode($subject['subject_code']),
							'text' => utf8_encode($subject['subject_name']), 
							'value' => utf8_encode($i)
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
    }elseif (!isset($_GET['class_code']) && isset($_GET['course_code'])) {
    	$course_code = $_GET['course_code'];
    	$i = 1;

    	try {
			$subjects = $get->get("getSubjects",$course_code);
			
			$subjectArray = array();
			
			if (!empty($subjects)) {
				foreach ($subjects as $subject) {
					$subjectArray[] = array(
						'id' => utf8_encode($subject['subject_code']),
						'text' => utf8_encode($subject['subject_name']),
						'value' => utf8_encode($i)
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