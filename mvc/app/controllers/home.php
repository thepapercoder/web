<?php 
class Home extends Controller{
	function index() {
		$myinfo = array('title' => "Index of somthing",
						'description' => "Ahihi la lala" );
		$this->render_view("index", $myinfo);
	}

	function hotnews() {
		require("app/models/article_model.php");
		$article = new Article();
		$article->title = "My first article";
		$article->description = "Nothing to say, this is just a tut I followed to make an mvc without framework";
		$article->content = "aaaaaaaaaaaaaaaa";
		$this->render_view("hotnews", array('news'=>$article));
	}

	function contact() {
		$this->render_view("contact");
	}

	function popup() {
		$this->render_view("popup", null, false);
	}

}

 ?>