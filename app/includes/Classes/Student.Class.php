<?php 
	/**
	* 
	*/
	class Student extends App
	{
		
		public static function getStudent($value,$params){
			$student_details = self::query("SELECT {$params} FROM `ezi_student` WHERE `student_code` = '{$value}'");
			if (empty($student_details[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $student_details[0];
				}else{
					return $student_details[0][$params];
				}
			}
		}

		public static function getStudentd($value,$params){
			$student_details = self::query("SELECT {$params} FROM `ezi_student` WHERE `student_code` = '{$value}'");
			if (empty($student_details[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $student_details[0];
				}else{
					return $student_details[0][$params];
				}
			}
		}

		public static function getallStudent($value,$params){
			$student_code = self::query("SELECT {$params} FROM `ezi_student` WHERE `school_code` = '{$value}' ");
			if (empty($student_details[0])) {
				return false;
			}else{
				if ($params == '*') {
					$student_details[] = 
					return $student_details[0];
				}else{
					return $student_details[0][$params];
				}
			}
		}
		
	}
?>