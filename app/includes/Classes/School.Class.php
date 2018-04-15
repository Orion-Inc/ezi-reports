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

		public static function getAcademicYear($params = '*'){
			$school_administration = self::query("SELECT {$params} FROM `ezi_school_academic_year` WHERE `id` = '1'");
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
			$getCrest = self::query("SELECT `school_crest` FROM `ezi_school_crest` WHERE `school_code` = '{$school_code}'");
			if (empty($getCrest[0])) {
				return '../assets/images/logo-2.png';
			} else {
				$crest = 'data:image;base64,' . base64_encode($getCrest[0]['school_crest']);
				return $crest;
			}
		}

		public static function getSchoolSignatories($school_code,$signatory){
			$getSignature = self::query("SELECT {$signatory} FROM `ezi_school_signatories` WHERE `school_code` = '{$school_code}'");
			if (empty($getSignature[0])) {
				return '';
			}else{
				$signature = 'data:image;base64,' . base64_encode($getSignature[0][$signatory]);
				return $signature;
			}
		}
	}
?>