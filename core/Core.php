<?php
class Core{

	public function run(){
		//print_r($_SERVER['PHP_SELF']); exit();
		$url = explode("index.php",$_SERVER['PHP_SELF']);
		$url = end($url);
		$params = array();
		//$url = '/'.((isset($_GET['q']))?$_GET['q']:'');
		//$params = array();

		if(!empty($url) && $url !='/'){
			$url = explode("/", $url);
			array_shift($url);//Remove a primeira '/'' do array

			$currentController = $url[0]."Controller";
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])){
				$currentAction = $url[0];
				array_shift($url);
			}
			else{
				$currentAction = "index";
			}

			if(count($url)>0){
				$params = $url;
				
			}
		}
		else{
			$currentController = "homeController";
			$currentAction = "index";			
		}

		require_once "core/controller.php";

		$c = new $currentController();
		call_user_func_array(array($c,$currentAction), $params);

	}
}

?>