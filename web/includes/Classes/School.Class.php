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
	}
?>