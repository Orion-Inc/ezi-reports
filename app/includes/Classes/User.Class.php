<?php 
	/**
	* 
	*/
	class User extends App
	{

		public static $userSession = array();


		public static function userSession($index)
		{
			self::$userSession[] = $_SESSION;
			
			return self::$userSession[0][$index];
		}

	}
?>