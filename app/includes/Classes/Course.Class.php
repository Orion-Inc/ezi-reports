<?php 
	/**
	* 
	*/
	class Course extends School
	{
		public static function getCourses($course_type,$params){
			$courses = self::query("SELECT {$params} FROM `ezi_course` WHERE `course_type` = '{$course_type}'");
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

		public static function getCourse($value,$params){
			$course_code = Classes::getClass($value,'class_course');

			$course = self::query("SELECT {$params} FROM `ezi_course` WHERE `course_code` = '{$course_code}'");
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


	}
?>