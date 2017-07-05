<?php
	require_once('class-db.php');
	if(!class_exists('INSERT')){
		class INSERT {
			public function post($title, $text, $url, $color, $size, $category, $price, $image_Path){
				global $db;
                                
				if(!empty($color)){					
					$color = serialize($color);
				}else {
					$color = "";
				}
                                
				if(!empty($size)){					
					$size = serialize($size);
				}else {
					$size = "";
				}
                                
				if(!empty($category)){
                                        $query = "SELECT * FROM piedavajums ORDER BY ID DESC LIMIT 1";
                                        $lastEntry = $db->select($query);
                                        $id = $lastEntry[0]->ID +1;
                                        foreach($category as $cat){
                                                        $query = "INSERT INTO kategorijas (category, product)
                                                                  VALUES ('$cat', '$id')
                                                                  ";
                                                        $db->insert($query);                                                
                                        }
					
                                        $query = "SELECT category FROM kategorijas";
                                        $dbCategory = $db->select($query);
                                        $categories = '';
                                        foreach($dbCategory as $object){                                        
                                                $categories[] = $object->category;
                                        }
				}
                                
				if(!empty($price)){					
					$price = serialize($price);
				}else {
					$price = "";
				}
                                
				if(!empty($image_Path)){					
					$image_Path = serialize($image_Path);
				}else {
					$image_Path = "";
				}
                                
				$query = "INSERT INTO piedavajums (title, text, url, images, color, size, price)
                                          VALUES ('$title', '$text', '$url', '$image_Path', '$color', '$size', '$price')
                                          ";
				return $db->insert($query);
			}
		}
	}
	
	$insert = new INSERT;
?>