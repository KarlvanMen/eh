<?php
header("Access-Control-Allow-Headers: Content-type");
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
$first = array();
$first['id'] = '0';
$first['title'] = 'Mr & Mrs Wedding Table Signs';
$first['options'] = array(
    array( 'name' => 'Unpainted DIY', 'price' => 25),
    array( 'name' => 'Chunky Silver Glitter', 'price' => 72),
    array( 'name' => 'Chunky Dk Silver Glitter', 'price' => 72),
    array( 'name' => 'Chunky Navy Glitter', 'price' => 72),
    array( 'name' => 'Chunky Lt Blue Glitter', 'price' => 72),
    array( 'name' => 'Chunky Rose Gold Glitter', 'price' => 72),
    array( 'name' => 'Chunky Vintage Gold Glitter', 'price' => 72),
    array( 'name' => 'Chunky Champagne Glitter', 'price' => 72),
    array( 'name' => 'Chunky White Glitter', 'price' => 72),
    array( 'name' => 'Glitter Spray Gold', 'price' => 72),
    array( 'name' => 'Glitter Spray Silver', 'price' => 72),
    array( 'name' => 'M. Vintage Gold', 'price' => 63),
    array( 'name' => 'M. Champagne', 'price' => 63),
    array( 'name' => 'M. Silver', 'price' => 63),
    array( 'name' => 'M. Dark Silver', 'price' => 63),
    array( 'name' => 'M. Pewter', 'price' => 63),
    array( 'name' => 'M. Pearl', 'price' => 63),
    array( 'name' => 'M. Rose Gold', 'price' => 63),
    array( 'name' => 'Metallic Blue', 'price' => 63),
    array( 'name' => 'Soft White', 'price' => 59),
    array( 'name' => 'Dark Purple', 'price' => 59),
    array( 'name' => 'Lavender', 'price' => 59),
    array( 'name' => 'Fuchsia', 'price' => 59),
    array( 'name' => 'Blush Pink', 'price' => 59),
    array( 'name' => 'Merlot', 'price' => 59),
    array( 'name' => 'Peach', 'price' => 59),
    array( 'name' => 'Coral', 'price' => 59),
    array( 'name' => 'Black', 'price' => 59),
    array( 'name' => 'Red', 'price' => 59),
    array( 'name' => 'Green', 'price' => 59),
    array( 'name' => 'Teal', 'price' => 59),
    array( 'name' => 'Yellow', 'price' => 59),
    array( 'name' => 'Orange Slice', 'price' => 59),
    array( 'name' => 'Grey', 'price' => 59),
    array( 'name' => 'Mint', 'price' => 59),
    array( 'name' => 'Chocolate Brown', 'price' => 59),
    array( 'name' => 'Navy Blue', 'price' => 59),
    array( 'name' => 'Sky Blue', 'price' => 59)
);
$first['tags'] = array("brideboxgroom","glitter sign","gold sign","mr \u0026 mrs","mr and mrs","mr and mrs sign","mr mrs signs","reception decor","sweetheart table","table sign mr mrs","wedding reception","wedding sign","wedding table sign");
$first['coverImg'] = 'https://cdn.shopify.com/s/files/1/0187/0182/products/mts100-pewter-2_large.jpg?v=1443114215';
$first['img'] = array(
    'https://cdn.shopify.com/s/files/1/0187/0182/products/mts100-pewter-2_1024x1024.jpg?v=1443114215',
    'https://cdn.shopify.com/s/files/1/0187/0182/products/MTS100_blushsilverchunky_1024x1024.jpg?v=1483403946',
    'https://cdn.shopify.com/s/files/1/0187/0182/products/mTS100_champagne_ericanelson_3_1024x1024.jpg?v=1483403957',
    'https://cdn.shopify.com/s/files/1/0187/0182/products/MTS100_DIY_1024x1024.jpg?v=1443114269'
);
$first['description'] = 'Mr and Mrs signs for the wedding sweetheart table are freestanding in a script font; our signs are extra stable at 1" thick which means they will not fall over. These Mr & Mrs wedding signs are great for rustic wedding decor or modern weddings and even make a beautiful decoration for your home! Purchase this listing for the script font freestanding Mr & Mrs sign set.';

$arr = array();

for ($i = 0; $i < 12; $i++) {
    $first["id"] = $i;
    $arr[] = $first;
}

echo json_encode($arr);
?>

