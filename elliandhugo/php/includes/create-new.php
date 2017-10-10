<?php
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once('insert-db.php');

$title = $desc = "";
$option = $collections = array();

if(isset($_POST)) {
    
    $title = test_input($_POST["pied_title"]);
    $desc = test_input($_POST["pied_text"]); 
    foreach ($_POST['pied_kol'] as $col) {
        $collections[] = test_input($col);
    }
    foreach ($_POST['pied_opt_name'] as $key => $ex) {
        $option[] = [test_input($ex), test_input($_POST['pied_opt_price'][$key])];
    }
    foreach ($_POST['image'] as $img) {
        $images[] = test_input($img);
    }
    pj([
        'result' => $insert->post($title, $desc, $images, $collections, $option),
        // 'title' => $title,
        // 'description' => $desc,
        // 'collections' => $collections,
        // 'options' => $option,
        // 'imageURL' => $images,
        // 'post' => $_POST
    ]);

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlEntities($data, ENT_QUOTES);
    return $data;
}   
function pj($message) {
    print json_encode($message, JSON_PRETTY_PRINT);
    exit;
}
?>