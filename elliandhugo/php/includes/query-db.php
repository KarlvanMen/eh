<?php
	require_once("class-db.php");
	if(!class_exists("QUERY")){
		class QUERY{
			public function all_posts(){
				global $db;
				
				$query = '
						SELECT * FROM piedavajums
						';
						
				return $db->select($query);
			}
			
			public function post($postid){
				global $db;
				
				$query = "
						SELECT * FROM piedavajums
						WHERE ID = '$postid'	
						";
						
				return $db->select($query);
			}
			
			public function category(){
				global $db;
				$query = "
						SELECT distinct category FROM kategorijas
						ORDER BY category	
						";
						
				return $db->select($query);
			}
		}
	}
	
	$query = new QUERY;
?>