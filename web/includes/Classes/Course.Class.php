<?php 
	/**
	* 
	*/
	class Course extends App
	{
		
		public static function getCourse($value,$params){
			$course = self::query("SELECT {$params} FROM `ezi_course` WHERE `course_code` = '{$value}'");
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