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
		else
        {
            return array("main");
        }
	}

	function Init()
    {
	    // Log file truy cập
        $log = fopen("log.txt", "a") or die("Unable to open file!");
        fwrite($log, isset($_GET['url']) ? $_GET['url']:"/");
        fwrite($log, "\n");
        fclose($log);
        // Kiểm tra quyền đăng nhập nếu chưa đăng nhập chỉ được vào đăng nhập
		if (!isset($_SESSION['is_login']))
        {
			require_once("$this->app_path/$this->controller_path/main.php");
			$controller = "Main";
            $c = new $controller;
            $c->login();
            exit;
		}
        // Parse the Url in to array
		$url = $this->ParseUrl();
        $controller = $url[0];
		if($url != NULL)
        {
            array_shift($url);
        }
        if (file_exists("$this->app_path/$this->controller_path/$controller.php"))
        {
            require_once "$this->app_path/$this->controller_path/$controller.php";
            if (class_exists($controller))
            {
                $action = isset($url[0]) ? $url[0] : "index";
                if(count($url) != 0)
                {
                    array_shift($url);
                }
                if (method_exists($controller, $action))
                {
                    $c = new $controller;
                    $c->$action();
                }
                else
                {
                    $c = new ErrorHandle();
                    $c->index();
                }
            }
            else
            {
                $c = new ErrorHandle();
                $c->index();
            }
        }
        else
        {
            $c = new ErrorHandle();
            $c->index();
        }

    }

}

 ?>