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

		public static function getStudentDetails($value,$params){
			$student_details = self::query("SELECT {$params} FROM `ezi_student_details` WHERE `student_code` = '{$value}'");
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

		
	}
?>