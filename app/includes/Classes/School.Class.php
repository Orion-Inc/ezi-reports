<?php 
	/**
	* 
	*/
	class School extends App
	{
		
		public static function getSchool($value,$params){
			$school = self::query("SELECT {$params} FROM `ezi_school` WHERE `school_code` = '{$value}'");
			if (empty($school[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $school[0];
				}else{
					return $school[0][$params];
				}
			}
		}

		public static function getAdministration($value,$params){
			$school_administration = self::query("SELECT {$params} FROM `ezi_school_administration` WHERE `school_code` = '{$value}'");
			if (empty($school_administration[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $school_administration[0];
				}else{
					return $school_administration[0][$params];
				}
			}
		}

		public static function getAcademicYear($value,$params){
			$school_administration = self::query("SELECT {$params} FROM `ezi_school_academic_year` WHERE `school_code` = '{$value}'");
			if (empty($school_administration[0])) {
				return false;
			}else{
				if ($params == '*') {
					return $school_administration[0];
				}else{
					return $school_administration[0][$params];
				}
			}
		}

		public static function getSchoolCrest($school_code){
			try {
				$files = glob('../../school_crests/'.$school_code.'{*.jpg,*.jpeg,*.gif,*.png}', GLOB_BRACE);
			} catch (Exception $e) {
				$files = glob('../../school_crests/default{*.png}', GLOB_BRACE);
			}
			App::show($files[0]);
		}

		public static function getSchoolSignatories($school_code,$signatory){
			$signature = self::query("SELECT {$signatory} FROM `ezi_school_signatories` WHERE `school_code` = '{$school_code}'");
			if (empty($signature[0])) {
				return '';
			}else{
				App::show('data:image;base64,'.base64_encode($signature[0][$signatory]));
			}
		}
	}
?>