<?php
// header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
// session_start();

// setlocale(LC_CTYPE, 'lv_LV');
  
$title = $desc = "";
$option = $collections = $img = $example = array();
$valid_formats = array("jpg", "png", "gif", "bmp");                        
$path = "../uploads/";
if(!empty($_POST)){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlEntities($data, ENT_QUOTES);
        return $data;
    }                              
    $title = test_input($_POST["pied_title"]);
    
    $desc = test_input($_POST["pied_text"]); 
    
    if(!empty($_POST["pied_opt_name"])) {
        foreach($_POST["pied_opt_name"] as $key => $opt){
            $option[] = [test_input($opt) => test_input($_POST["pied_opt_price"][$key])];
        }
    }
    foreach ($_POST['pied_kol'] as $col) {
        $collections[] = test_input($col);
    }
    foreach ($_POST['example'] as $ex) {
        $example[] = test_input($ex);
    }        

    // require_once('insert-db.php');
    // $insert->post($title, $desc, $url, $colors, $size, $cat, $price, $img);                        
}
$value = array(
    'return' => 1, 
    'title'=>$title, 
    'description'=>$desc, 
    "options"=>$option, 
    'collections' => $collections, 
    'pics' => $img, 
    'test' => $example,
    'size' => (int) $_SERVER['CONTENT_LENGTH'],
    // 'post' => $_POST,
    // 'files' => $_FILES
);

pj($value)

function pj($message) {
    print json_encode($message, JSON_PRETTY_PRINT);
    exit;
}
?>