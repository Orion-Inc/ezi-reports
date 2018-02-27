<?php 
	/**
	* 
	*/
	class Course extends School
	{
		public static function getCourses($course_type,$params){
			if ($course_type == "All") {
				$courses = self::query("SELECT {$params} FROM `ezi_course`");
			} else {
				$courses = self::query("SELECT {$params} FROM `ezi_course` WHERE `course_type` = '{$course_type}'");
			}
			
			if (empty($courses[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $courses;
				}else{
					return $courses[0][$params];
				}
			}
		}

		public static function getCourse($value,$params,$admin = ''){
			if ($admin == "eziCourse") {
				$course = self::query("SELECT {$params} FROM `ezi_course` WHERE `course_code` = '{$value}'");
			} else {
				$course_code = Classes::getClass($value,'class_course');
				$course = self::query("SELECT {$params} FROM `ezi_course` WHERE `course_code` = '{$course_code}'");
			}
			
			if (empty($course[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $course[0];
				}else{
					return $course[0][$params];
				}
			}
		}

		private function getSubjects($course_code)
		{
			$subjects = self::query("SELECT `subject_code`,`subject_name` FROM `ezi_subjects` WHERE `course_code` = '{$course_code}'");
			if (empty($subjects[0])) {
				return false;
			}else{
				return $subjects;
			}
		}

		public static function getClassSujects($class_code)
		{
			$subjects = self::query("SELECT `class_subjects` FROM `ezi_school_class_subject` WHERE `class_code` = '{$class_code}'");
			if (empty($subjects[0])) {
				return false;
			}else{
				$subjectArray = explode(",", $subjects[0]['class_subjects']);
				$subjectData = array();

				foreach ($subjectArray as $subject_code) {
					$subjects = self::query("SELECT `subject_code`,`subject_name` FROM `ezi_subjects` WHERE `subject_code` = '{$subject_code}'");
					$subjectData[] = array('subject_code' => $subjects[0]['subject_code'], 'subject_name' => $subjects[0]['subject_name']); 
				}

				return $subjectData;	
			}
		}

		public function get($function,$arg) {
	      	return $this->$function($arg);
	    }
	}
?>