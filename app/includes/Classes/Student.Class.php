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

		public static function getStudent($student_code,$params){
			$student = Database::query("SELECT * FROM `ezi_student` WHERE `student_code` = '{$student_code}'");
			$student_details = self::query("SELECT {$params} FROM `ezi_student_details` WHERE `student_code` = '{$student_code}'");

			$student_info[] = array_merge($student[0],$student_details[0]);

			if (empty($student_info[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $student_info[0];
				}else{
					return $student_info[0][$params];
				}
			}
		}

		public static function getStudentGuardian($value,$params){
			$student = self::query("SELECT {$params} FROM `ezi_student_guardian` WHERE `student_code` = '{$value}'");
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