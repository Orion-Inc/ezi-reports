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

		public function randomizer($length) {
			$code = "";
			$randomValue = array();
			$chars = array_merge(range(0,9));

			for($count = 0; $count < $length; $count++){
				$randomValue[] = $chars[array_rand($chars)];
			}

			for ($i=0; $i < sizeof($randomValue); $i++) { 
				$code .= $randomValue[$i];
			}

			return $code;
		}

		public function token_generator(){
			$token = bin2hex(openssl_random_pseudo_bytes(30));
			return $token;
		}

		
	}
?>