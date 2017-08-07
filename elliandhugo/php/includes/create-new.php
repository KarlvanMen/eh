<?php
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
// session_start();
setlocale(LC_CTYPE, 'lv_LV');
  
$titleErr = $descErr = $urlErr = $imgErr = $colorErr = $sizeErr = $catErr = $priceErr = "";
$title = $desc = $url = "";
$option = $cat = $img = array();
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");                        
$path = "../img/";
if(!empty($_POST)){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }                              
    $title = test_input($_POST["pied_title"]);
    
    $desc = test_input($_POST["pied_text"]); 
    
    if(!empty($_POST["pied_opt"])) {
        foreach($_POST["pied_opt"]['name'] as $opt){
            $option[] = $opt;
        }
    }
    // return true;
    $value = array(['return' => 1, 'message'=>"so far so good", "options"=>$option]);
    $output = json_encode($value);
    echo $output;
    
    // if (!empty($_POST["pied_opt"])) {
    //     foreach ($_POST['pied_color'] as $clr) {
    //         $colors[] = $clr;
    //     }
    // } else {
    //     $colors = '';
    // }
    // if (!empty($_POST["pied_size"])) {
    //     foreach ($_POST['pied_size'] as $sizes) {
    //         $size[] = $sizes;
    //     }
    // }else {
    //     $size = '';
    // }
    // if (!empty($_POST["pied_cat"])) {
    //     foreach ($_POST['pied_cat'] as $cate) {
    //         if($cate != ''){
    //             $cat[] = $cate;
    //         }
    //     }
    // }else {
    //     $cat = '';
    // }
    // if (!empty($_POST["pied_price"])) {
    //     foreach ($_POST['pied_price'] as $prc => $value) {
    //         if($value != ''){
    //             $price[$prc] = $value;
    //         }
    //     }
    // }else {
    //     $price = '';
    // }

    // require_once('insert-db.php');
    // $insert->post($title, $desc, $url, $colors, $size, $cat, $price, $img);                        
}