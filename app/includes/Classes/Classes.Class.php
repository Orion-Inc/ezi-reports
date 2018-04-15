<?php
	class Classes extends Course
	{
		public static function fetchClasses($school_code,$params){
			$classes = self::query("SELECT {$params} FROM `ezi_school_class` WHERE `school_code` = '{$school_code}'");
			if (empty($classes[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $classes;
				}else{
					return $classes[0][$params];
				}
			}
		}

		public static function fetchCourseClasses($school_code,$course_code,$params){
			$courseClasses = self::query("SELECT {$params} FROM `ezi_school_class` WHERE `school_code` = '{$school_code}' AND `class_course` = '{$course_code}'");
			if (empty($courseClasses[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $courseClasses;
				}else{
					return $courseClasses[0][$params];
				}
			}
		}

		public static function getClass($value,$params){
			$course = self::query("SELECT {$params} FROM `ezi_school_class` WHERE `class_code` = '{$value}'");
			if (empty($course[0])) {
				if(substr($value, 0, 3) == "ALU"){
					return $value;
				}else{
					return false;
				}
			}else{
				if ($params == '*') {
					return $course;
				}else{
					return $course[0][$params];
				}
			}
		}

		public static function getClassEnrollment($class_code){
			$course = self::query("SELECT COUNT(`student_code`) FROM `ezi_student_details` WHERE `student_class`='{$class_code}'");
			if (empty($course[0])) {
				return false;
			}else{
				return $course[0]['COUNT(`student_code`)'];
			}
		}

	}
?>