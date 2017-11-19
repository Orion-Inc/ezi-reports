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

		public function random_string($length) {
			$random_value = "";
			$random_values = array_merge(range(0,9), range('A', 'Z'), range('a', 'z'));

			for($count = 0; $count<$length; $count++){
				$random_value .= $random_values[array_rand($random_values)];
			}

			foreach ($random_value as $key){
				$key .= $random_value[array_rand($random_value)];
			}

			return $key;
		}
		
	}
?>