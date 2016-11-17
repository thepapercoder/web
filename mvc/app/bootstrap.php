<?php 
class Bootstrap {
	function __construct() {
		global $app_path, $controller_path, $view_path, $model_path, $error_path;
		$this->app_path = $app_path;
		$this->controller_path = $controller_path;
		$this->view_path = $view_path;
		$this->model_path = $model_path;
		$this->error_path = $error_path;
	}

	function ParseUrl() {
		if (isset($_GET['url'])) {
			$url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			return $url;
		}
		return null;
	}

	function Init() {	
		$url = $this->ParseUrl();
		$controller = isset($url[0]) ? $url[0] : "home";
		array_shift($url); 
		if ($controller != "") {
			if (!file_exists("$this->app_path/$this->controller_path/$controller.php")) 
			{	
				require_once("$this->app_path/$this->controller_path/error.php");
				$controller = "Error";
			} 

			require_once("$this->app_path/$this->controller_path/$controller.php");

			if (!class_exists($controller))
			{
				require_once("$this->app_path/$this->controller_path/error.php");
				$controller = "Error";
			}	
			$c = new $controller;
			$action = isset($url[0]) ? $url[0] : "index";
			array_shift($url);
			if (!method_exists($controller, $action)) {
				require_once("$this->app_path/$this->controller_path/error.php");
				return;
			}
			$c->$action();
		}
	}
}

 ?>