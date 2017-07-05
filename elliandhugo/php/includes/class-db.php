<?php
if(!class_exists('DB')){
	class DB{
		public function __construct(){
			$mysqli = new mysqli("localhost:3306", "MD1146", "Cl15-8pjwczy", "prodLV");
			
			if($mysqli->connect_errno){
				printf("Connection failed %s");
				printf($mysqli->connect_err);
				exit();
			}
			$this->connection = $mysqli;
		}
		
		public function insert($query){
			$mysqli = $this->connection;				
			$result = $mysqli->query($query);
			return $result;
		}
		
		public function select($query){
			
			$result = $this->connection->query($query);
			
			while($obj = $result->fetch_object()){
				$results[] = $obj;
			}
			if(!empty($results)){
				return $results;
			} else {
				return 0;
			}
		}
	}
}
$db = new DB;
?>