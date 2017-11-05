<?php 
	/**
	* 
	*/
	class Student extends School
	{
		public static function getStudents($school_code){
			$students = self::query("SELECT * FROM `ezi_student` WHERE `school_code` = '{$school_code}'");
			if (empty($students)) {
				return false;
			}else{
				return $students;
			}
		}

		public static function getStudent($value,$params){
			$student = self::query("SELECT {$params} FROM `ezi_student_details` WHERE `student_code` = '{$value}'");
			if (empty($student[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $student[0];
				}else{
					return $student[0][$params];
				}
			}
		}
	}
?>