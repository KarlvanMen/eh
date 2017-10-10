<?php
	require_once('class-db.php');
	if(!class_exists('INSERT')){
		class INSERT {
			public function post($title, $text, $imgURL, $collections, $options){
				global $db;                
                // return 'inside insert-db.php';    
				$query = "SELECT * FROM produkcija ORDER BY ID DESC LIMIT 1";
				$lastEntry = $db->select($query);
				$last_id = $lastEntry[0]['ID'] +1;            
				if(!empty($collections)){
					foreach($collections as $col){
						$query = "INSERT INTO collections (collection, product)
									VALUES ('$col', '$last_id')
									";
						$db->insert($query);                                                
					}
				}
				if(!empty($options)){
					foreach($options as $option){
						$query = "INSERT INTO options (product_option, price, product)
									VALUES ('$option[0]','$option[1]', '$last_id')
									";
						$db->insert($query);                                                
					}
				}
				$rtrn = [];
				
				if(!empty($imgURL)){
					foreach($imgURL as $url){
						$rtrn[] = $url;
						$query = "INSERT INTO images (url, product)
									VALUES ('$url', '$last_id')
									";
						$db->insert($query);                                                
					}
				}             
				$query = "INSERT INTO produkcija (title, description) 
							VALUES ('$title', '$text')";
				return $db->insert($query);
			}
		}
	}
	
	$insert = new INSERT;
?>