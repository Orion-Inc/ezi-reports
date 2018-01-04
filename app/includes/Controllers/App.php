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

		public static function ViewPartial($partialName,$tree,$page_index='../')
		{
			if (empty($tree)) {
				include $page_index.'partials/app-'.$partialName.'.php';
			}else{
				include $page_index.'partials/'.$tree.'/app-'.$partialName.'.php';
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

		public function randomString($length) {
			$randstr = '';
			srand((double) microtime(TRUE) * 1000000);
			//our array add all letters and numbers if you wish
			$chars = array(
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
				'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
				'6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
				'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

			for ($rand = 0; $rand <= $length; $rand++) {
				$random = rand(0, count($chars) - 1);
				$randstr .= $chars[$random];
			}
			return $randstr;
		}

		public function token_generator(){
			$token = bin2hex(openssl_random_pseudo_bytes(30));
			return $token;
		}

		
	}
?>