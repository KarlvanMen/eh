<?php
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$targetNum = 0;
// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_FILES)) {
    $errormsg = "nothing to show";
    $temp = explode('.', $target_file, -1);
    $temp = implode($temp);
    $temp = "..".$temp;
    $temp .= (string)$targetNum;
    $info = new SplFileInfo($target_file);
    $ext = $info->getExtension();
    $temp .= ".".$ext;

    while(file_exists($temp)){
        $stringTN = count(str_split($targetNum));
        $targetNum++;
        $temp = explode('.', $target_file, -1);
        $temp = implode($temp);
        $temp = "..".$temp;
        $temp .= $targetNum;
        $temp .= ".".$ext;
    }
    if (move_uploaded_file($_FILES['img']['tmp_name'], $temp)) {
        $errormsg = true;
    } else {
        $errormsg = false;
    }
    pj([
        "message" => $errormsg, 
        "name" => $temp,
        'strlen' => $stringTN,
        "temp" => [$temp, $target_file]
        ]);

}

function pj($message) {
    print json_encode($message, JSON_PRETTY_PRINT);
    exit;
}
?>