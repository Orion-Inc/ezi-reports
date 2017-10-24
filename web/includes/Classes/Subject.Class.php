<?php 
	/**
	* 
	*/
	class Subject extends Course
	{
		
		public static function getStudentSubjects($student_code){
			$student_subjects = self::query("SELECT * FROM `ezi_student_subject` WHERE `student_code` = '{$student_code}'");
			if (empty($student_subjects)) {
				return array('msg' => 'No Subjects Available!');
			}else{
				return $student_subjects[0];
			}
		}

		public static function getSubject($subject_code,$params){
			$subject = self::query("SELECT {$params} FROM `ezi_subjects` WHERE `subject_code` = '{$subject_code}'");
			if (empty($subject[0])) {
				return 'Not Available';
			}else{
				if ($params == '*') {
					return $subject[0];
				}else{
					return $subject[0][$params];
				}
			}
		}
	}
?>