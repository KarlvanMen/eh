<?php
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
        if(!empty($_GET)){
                session_start();	
                require_once('class-db.php');	
                $login = $_GET['uid'];	
                $pass = $_GET['pass'];	
                
                function test_input($data) {		
                        $data = trim($data);		
                        $data = stripslashes($data);		
                        $data = htmlspecialchars($data);		
                        return $data;		
                }	
                
                $login = test_input($login);	
                $pass = test_input($pass);	
                
                $query = "SELECT * FROM loguser where email = '$login' and pwd = '$pass'";	
                
                // echo "<p>$login</p>";	
                // echo "<p>$pass</p>";	
                        
                $result = $db->select($query);
                
                // echo "<p><pre>";
                // print_r($result);
                // echo "</pre></p>";
                $arr = array('success' => 0);
                foreach($result as $res){	
                        if($res->email == $login){	
                                if($res->pwd == $pass){				
                                        $id = $result[0]->id;				
                                        $_SESSION['id'] = $id;	
                                        $arr = array('success' => 1); 	
                                        //header("Location: http://localhost/elliandhugo/admin/login.php");				
                                        // header("Location: http://elliandhugo.lv/testAdmin.php");				
                                }		
                        }		
                }
                                              	
                echo json_encode($arr);	
                die();	
        }
?>