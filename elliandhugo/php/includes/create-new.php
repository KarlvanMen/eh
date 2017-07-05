<?php
session_start();
setlocale(LC_CTYPE, 'lv_LV');


if(isset($_SESSION['id'])){    
    $titleErr = $descErr = $urlErr = $imgErr = $colorErr = $sizeErr = $catErr = $priceErr = "";
    $title = $desc = $url = "";
    $colors = $size = $cat = $price = $img = array();
    $valid_formats = array("jpg", "png", "gif", "zip", "bmp");                        
    $path = "../img/";
    if(!empty($_POST)){

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (empty($_POST["pied_title"])) {
            $titleErr = "Title is required";
        } else {                                
            $title = test_input($_POST["pied_title"]);
        }
        if (empty($_POST["pied_text"])) {
            $desc = "";
        } else {
            $desc = test_input($_POST["pied_text"]);  
        }

        if (!empty($_POST["pied_url"])) {
            $url = iconv('UTF-8', 'ASCII//TRANSLIT', test_input($_POST["pied_url"]));
            if (!empty($_FILES["pied_img"])) {
                $imgCount = 0;
                foreach ($_FILES['pied_img']['name'] as $f => $name) {                                                 
                    if ($_FILES['pied_img']['error'][$f] == 4) {
                        continue;
                    }
                    if ($_FILES['pied_img']['error'][$f] == 0) {
                        if( !in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                            $colorErr[] = "$name is not a valid format";
                            continue;
                        } else {
                            $extension = pathinfo($name, PATHINFO_EXTENSION);
                            $imgName = $path.$url.$imgCount.'.'.$extension;
                            while (file_exists($imgName)) {
                                $imgCount++;
                                $imgName = $path.$url.$imgCount.'.'.$extension;
                            }
                            if(move_uploaded_file($_FILES["pied_img"]["tmp_name"][$f], $imgName)){
                                $img[] = $url.$imgCount.'.'.$extension;
                            }

                        }
                    }
                }
            }
        } else {
            $url = '';
            unset($img);
            $img = array();
        }
        if (!empty($_POST["pied_color"])) {
            foreach ($_POST['pied_color'] as $clr) {
                $colors[] = $clr;
            }
        } else {
            $colors = '';
        }
        if (!empty($_POST["pied_size"])) {
            foreach ($_POST['pied_size'] as $sizes) {
                $size[] = $sizes;
            }
        }else {
            $size = '';
        }
        if (!empty($_POST["pied_cat"])) {
            foreach ($_POST['pied_cat'] as $cate) {
                if($cate != ''){
                    $cat[] = $cate;
                }
            }
        }else {
            $cat = '';
        }
        if (!empty($_POST["pied_price"])) {
            foreach ($_POST['pied_price'] as $prc => $value) {
                if($value != ''){
                    $price[$prc] = $value;
                }
            }
        }else {
            $price = '';
        }

        require_once('insert-db.php');
        $insert->post($title, $desc, $url, $colors, $size, $cat, $price, $img);                        
    }

    ?>
    <hmtl>
     <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
        <title>Insert post</title>
        <style>
                        #priceCheckbox:checked{
            background-color:#2196f3;
        }
        img{
            max-width: 200px;
            height:auto;
        }
    </style>
</head>
<body>
  <form method="post" enctype="multipart/form-data">
   <p>
    <input id='title' type="text" name="pied_title" placeholder='Title' onkeyup='changeURL()' value='<?php echo $title; ?>'/>
    <?php echo $titleErr; ?>
</p>
<p>
    <textarea name="pied_text" placeholder='Description'><?php echo $desc; ?></textarea>
</p>
<p>
    <input id='url' type="text" name="pied_url" placeholder='URL' value='<?php echo $url; ?>'/>
</p>
<p>
    <input type="file" name="pied_img[]" id="images" accept="image/*" multiple>
    <p id="imageHolder">
        <?php
        if(!empty($img[0])){
            $imgCount = 0;
            foreach ($img as $imgName) {                                                 
                echo '<img src=../../img/'.$imgName.' />';
                $imgCount++;  
            }
        }
        ?>
    </p>
</p>
<p id="color"><?php
    $colorCount = count($colors);
    if(!empty($colors[0])){
        foreach ($colors as $clr) {
            if(!empty($clr)){
                echo "<input type='color' name='pied_color[".$colorCount."]' placeholder='Color Option' value=".$clr.">";
                $colorCount++;
            }
        }
    }
    ?></p>  

    <p id="colorButton">
        <input type="button" value="Add color" onClick="addInput('color');">
        <input id="removeColor" style="display: none;" type="button" value="Remove color" onClick="removeInput('color', 1,1);">
    </p>
    <p>
       <p id="size"><?php
        $sizeCount = count($size);
        if(!empty($size)){
            foreach ($size as $clr) {
                if(!empty($clr)){
                    echo "<input type='text' name='pied_size[".$sizeCount."]' placeholder='Size Option' value=".$clr.">";
                    $sizeCount++;
                }
            }
        }
        ?></p>  
        <p id="sizeButton">
            <input type="button" value="Add size" onClick="addInput('size');">
            <input id="removeSize" style="display: none;" type="button" value="Remove size" onClick="removeInput('size',1,1);">
        </p>
        <p>
            <?php
            require_once("query-db.php"); 
            $category_array = $query->category();
            $catCount = 0;
            if(!empty($category_array)){
                foreach($category_array as $cate):
                    echo '<label for="pied_cat">'.$cate->category.'</label>';
                $check = ">";
                if(!empty($cat)){
                    foreach($cat as $category){
                        if(!strcmp($category,$cate->category)){
                            $check = "checked>";
                            break;
                        }
                    }
                }
                echo '<input type="checkbox" name="pied_cat['.$catCount.']"value='.$cate->category.' '.$check;
                echo '<br>';
                $catCount++;
                endforeach;
            }
            ?>
        </p>
        <p id="cat"></p>                        
        <input type="button" value="Add a new category" onClick="addInput('cat');">
        <p>
            All have the same price
            <input id='priceCheckbox' type="checkbox" name="pied_priceCheck" checked>
            <input id='priceForAll' type="text" name="pied_price[all]" placeholder="0.00€" value="<?php if(array_key_exists('all', $price))echo $price['all']; ?>"/>

        </p>
        <p id="price" style="display:none">                                
        </p>
        <p id='priceRelationship'>
        </p>
        <p>
            <input type="submit" value="Submit"/>
        </p>
    </form>
    <script>
        var showRemoveColor = true;
        var showRemoveSize = true;
        var color =  document.getElementById('color').children.length;
        if(color > 0){
            document.getElementById('removeColor').style.display = 'inline';
            showRemoveColor = false;
        }
        var size = document.getElementById('size').children.length;
        if(size > 0){
            document.getElementById('removeSize').style.display = 'inline';
            showRemoveSize = false;
        }

        function changeURL(){
            var url = document.getElementById('url');
            var title = document.getElementById('title');
            var urlText = title.value;
            urlText = urlText.replace(/\s/g, '');
            while(urlText.substring(urlText.length - 1, urlText.length) == '_'){
                urlText = urlText.substring(0, urlText.length-1);
            }

            url.value=urlText;
        }

        function addInput(divName){                                                                                                     
            var counter = 0;
            var _name = "";
            var _placeHolder = "";
            var change = "";
            var _type = 'text';

            switch (divName) {
                case "color":
                counter = color;
                _name = "pied_color";
                _placeHolder = "Color Option";
                change = 'color';
                _type = 'color';
                color++;
                if(showRemoveColor){
                    document.getElementById('removeColor').style.display = 'inline';
                    showRemoveColor = false;
                }
                break;
                case "size":
                counter = size;
                _name = "pied_size";
                _placeHolder = "Size Option";
                change = 'size';
                size++;
                if(showRemoveSize){
                    document.getElementById('removeSize').style.display = 'inline';
                    showRemoveSize = false;
                }
                break;
                case "cat":
                _name = "pied_cat";
                _placeHolder = "Category";
                counter = <?php echo ++$catCount ?>;
                break;
            }

            var newdiv = document.createElement('input');

            newdiv.type = _type;
            newdiv.name = _name + "[" + counter + "]";
            newdiv.placeholder = _placeHolder;
            if(divName === "size"){
                newdiv.onchange = function(){priceChange();};
            }

            document.getElementById(divName).appendChild(newdiv);
            if(divName === 'size'){                                        
                priceChange();
            }
        }

        var price = document.getElementById('price');
        var checkbx = document.getElementById('priceCheckbox');
        priceChange();

        checkbx.addEventListener('change', function (event) {
            if (checkbx.checked) {
                price.style.display = 'none';
                document.getElementById('priceForAll').style.display = 'inline';
            } else {
                price.style.display = 'block';
                document.getElementById('priceForAll').style.display = 'none';
            }
        });  

        function priceChange(){
            var sizeP = document.getElementById('size');
            for(var i = 0; i < sizeP.children.length; i++){
                var value = sizeP.children[i].value;
                if(value != ''){   
                    var match = false;
                    for(var j = 0; j < price.children.length; j++){
                        if(price.children[j].children[0].innerHTML == value){
                            match = true;
                            break;
                        }                                                        
                    }
                    if(!match){
                        var paragraph = document.createElement('P');
                        var parent = document.createElement('P');
                        var text = document.createTextNode("" + value + "");
                        var priceInput = document.createElement('INPUT');
                        priceInput.type = 'text';
                        priceInput.name = "pied_price[" + value + "]";
                        priceInput.placeholder = "€";                                                        
                        <?php
                        foreach($price as $prc => $value){
                            ?>
                            if(value == <?php echo '"'.$prc.'"'; ?>){
                                priceInput.value = <?php
                                if($value != ''){
                                    echo $value; 
                                }else{
                                    echo"''";
                                }
                                ?>;
                            }
                            <?php
                        }
                        ?>
                        paragraph.appendChild(text);
                        parent.appendChild(paragraph);
                        parent.appendChild(priceInput);
                        price.appendChild(parent);
                    }

                }
            }
            for(var i = 0; i < price.children.length; i++){
                var value = price.children[i].children[0].innerHTML;
                if(value != ''){   
                    var match = false;
                    for(var j = 0; j < sizeP.children.length; j++){
                        if(sizeP.children[j].value == value){
                            match = true;
                            break;
                        }
                    }
                    if(!match){
                        price.removeChild(price.children[i]);
                    }

                }
            }
        }

        function removeInput(type, e, index){
            switch(type){
                case 'color':
                if(color != 0){
                    document.getElementById("color").lastChild.remove();                                                        
                    color =  document.getElementById('color').children.length;
                    <?php
                    if(!empty($colors[0])){
                        array_pop($colors);
                    }
                    ?>
                } 
                if (color === 0) {
                    document.getElementById('removeColor').style.display = 'none'; 
                    showRemoveColor = true;
                }                                                
                break;
                case 'size':
                if(size != 0){
                    document.getElementById("size").lastChild.remove();
                    size--;
                } 
                if (size === 0) {
                    document.getElementById('removeSize').style.display = 'none'; 
                    showRemoveSize = true;
                }
                priceChange();

                break;
                case 'price':
                var sizeDD = document.getElementById('sizeDD');
                var option = sizeDD.options[index];
                option.disabled = false;
                e.parentNode.parentNode.removeChild(e.parentNode);
                break;
            }
        }

        var images = document.getElementById("images"); 
        var imageHolder = document.getElementById("imageHolder");
        images.onchange = function () {
            while (imageHolder.firstChild) {
                imageHolder.removeChild(imageHolder.firstChild);
            }

            var lngth = this.files.length;                                

            for(var i = 0; i < lngth; i++){
                var reader = new FileReader();
                reader.onload = function (e) {
                                                // get loaded data and render thumbnail.

                    var newImg = document.createElement('IMG');   
                    newImg.src = e.target.result;
                    imageHolder.appendChild(newImg);
                }
                reader.readAsDataURL(this.files[i]);                                                                                
            };
        };
    </script>
</body>
</hmtl>
<?php
} else {
    header("Location: http://elliandhugo.lv/testAdmin.php");
    die();
}
?>