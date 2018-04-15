<?php 
	/**
	* 
	*/
	class Student extends School
	{

		public static function getStudents($school_code){
			$students = self::query("SELECT * FROM `ezi_student` WHERE `school_code` = '{$school_code}' AND `status` = '1'");
			if (empty($students)) {
				return false;
			}else{
				return $students;
			}
		}

		public static function getStudent($student_code,$params){
			$student = self::query("SELECT * FROM `ezi_student` WHERE `student_code` = '{$student_code}'");
			$student_guardian_details = self::query("SELECT * FROM `ezi_student_guardian` WHERE `student_code` = '{$student_code}'");
			$student_class = self::query("SELECT `student_class` FROM `ezi_student_class` WHERE `student_code` = '{$student_code}'");

			$student_details = self::query("SELECT `student_dob`,`student_gender`,`student_status`,`student_house` FROM `ezi_student_details` WHERE `student_code` =  '{$student_code}'");
			
			if (empty($student_class)) {
				$student_details = self::query("SELECT * FROM `ezi_student_details` WHERE `student_code` = '{$student_code}'");
				$student_info[] = array_merge($student[0], $student_details[0], $student_guardian_details[0]);
			}else{
				$student_info[] = array_merge($student[0], $student_class[0], $student_details[0], $student_guardian_details[0]);
			}

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