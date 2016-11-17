<?php 
class Database {
	 private $db;
	 function __construct() {
	 	$this->db = new PDO("mysql:host=localhost;dbname:mvc","root","");
	 }
	 function QueryResult($sql) {
	 	$query = $this->db->prepare($sql);
	 	$query->execute();
	 	return $query;
	 }
	 function ExeQuery($sql) {
	 	$q = $this->db->exec($sql);
	 	return $q;
	 }
}

 ?>