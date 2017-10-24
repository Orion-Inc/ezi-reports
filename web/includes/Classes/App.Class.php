<?php 
	/**
	* 
	*/
	class App extends Database
	{
		public static function show($value='') {
			if (empty($value)) {
				$value = "Not Available";
			}
			echo $value;
		}
		
		public static function CreateView($viewName){
			require_once '../views/'.$viewName.'.php';
		}

		public static function ViewPartial($partialName,$tree){
			include '../partials/'.$tree.'/'.$partialName.'.php';
		}
	}
?>