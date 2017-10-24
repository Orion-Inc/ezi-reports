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
		
		public static function CreateView($viewName)
		{
			require_once '../views/'.$viewName.'.php';
		}

		public static function ViewPartial($partialName,$tree)
		{
			if (empty($tree)) {
				include '../partials/app-'.$partialName.'.php';
			}else{
				include '../partials/'.$tree.'/app-'.$partialName.'.php';
			}
		}

		
	}
?>