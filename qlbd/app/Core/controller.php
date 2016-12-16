<?php
abstract class Controller {
    public abstract function index();

    public function view($view, $data = null, $use_template = true, $template_name = "default") {
        // Mặc định data truyền vào là null, uselayout = true
		// nghĩa là mặc định sẽ sử dụng layout
		global $app_path, $controller_path, $view_path, $mode_path;
		// Truyền tham số sang cho view
		if ($data != null) {
			foreach ($data as $key => $value)
			{
				$$key = $value;
			}
		}
		$controller_name = strtolower(get_class($this));
		if($use_template) {
			require_once ("$app_path/$view_path/share/header.php");
		}
		require("$app_path/$view_path/$controller_name/$view.php");
		if($use_template) {
			require_once ("$app_path/$view_path/share/footer.php");
		}
    }

    public function check_permission($user=null) // $user chứa tên các user được phép gọi hàm này.
	{   
        global $app_path, $controller_path, $view_path, $mode_path;
		if ($user == null || !isset($_SESSION['user_type'])) {
			require_once("$app_path/$controller_path/errorhandle.php");
            $c = new ErrorHandle();
            $c->notAuth();
            exit;
		}
		$check = false;
		foreach ($user as $key => $value) {
			if ($value == $_SESSION['user_type'])
				$check = true;
		}
		if ($check != true) {
			require_once("$app_path/$controller_path/errorhandle.php");
            $c = new ErrorHandle();
            $c->notAuth();
            exit;
		}
	}
    
}