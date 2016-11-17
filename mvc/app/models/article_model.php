<?php 
require 'app/core/model.php';
class Article extends Model {
	var $title;
	var $description;
	var $content;
	var $created;
	var $author;

	function show() {
		$rs = "<div class='row'>
		<h2>$this->title</h2>
		<span class='desc'>$this->description</span>
		<span class='content'>$this->content</span>
		</div>";
		echo $rs;
	}

}

 ?>