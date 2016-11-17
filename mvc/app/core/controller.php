<?php 
class Controller {
	function render_view($view, $data = null, $uselayout = true) {
		// Mặc định data truyền vào là null, uselayout = true
		// nghĩa là mặc định sẽ sử dụng layout
		global $app_path, $controller_path, $view_path, $mode_path;
		// Truyền tham số sang cho view
		if ($data != null) {
			foreach ($data as $key => $value) {
				$$key = $value;
			}
		}
		$controller_name = get_class($this);
		if($uselayout) {
			require_once ("$app_path/$view_path/share/header.php");
			echo "<h1>Đây là đẹp trai</h1>";
		}
		require("$app_path/$view_path/$controller_name/$view.php");
		if($uselayout) {
			require_once ("$app_path/$view_path/share/footer.php");
		}
	}

}	
 ?>
