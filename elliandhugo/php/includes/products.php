<?php
function displayHome($db){
	$query = "SELECT * FROM piedavajums ORDER BY ID DESC LIMIT 9";
	$produkti = $db->select($query);
	foreach($produkti as $prod){
		$images = unserialize($prod->images);
		$title = $prod->title;
		$price = unserialize($prod->price);
		$priceText = '';
		if(count($price) > 1){
			$least = 999999;
			foreach($price as $prc){
				if($least > intval($prc)){
					$least = intval($prc);
				}
			}

			$least = '<strong>'.$least.'</strong>';
			$priceText = "Sākot no ".$least." €";
		} else {
			$priceText = $price['all'];
			if($priceText != '' && is_numeric($priceText)){
				$priceText = $priceText.' €';
			}
			$priceText = '<strong>'.$priceText.'</strong>';
		}
		echo '<a class="produkti" href="?p='.$prod->url.'">
				<div class="produkti-image" style="background-image:url(img/'.$images[0].')"></div>
				<p class="produkti-title">'.$title.'</p>
				<p class="produkti-price">'.$priceText.'</p>
			</a>';
	}
	echo "<p class='view-more'><a href='?cat=all' title='Skatīt visu kolekciju'>Skatīt visus piedāvājumus</a></p>";
}
function displayProduct($p, $path, $db){		
	$query = "SELECT * FROM piedavajums WHERE url = '".$p."' ORDER BY ID";
	$produkts = $db->select($query);                                                               

	$title = $produkts[0]->title;
	$text = $produkts[0]->text;
	$images = unserialize($produkts[0]->images);
	$color = unserialize($produkts[0]->color);
	$size = unserialize($produkts[0]->size);
	$price = unserialize($produkts[0]->price); 

	echo '<div class="section-header section-header-breadcrumb">
		<nav class="breadcrumb">
			<a href="http://localhost/elliandhugo/" title="Atpakaļ uz sākumlapu">Sākums</a>
			<span aria-hidden="true" class="breadcrumb_sep">›</span>';
			if(!empty($path)){
				echo $path;
				foreach($path as $tp){
					echo '<a href="#" title="Back to '.$tp.'">'.$tp.'</a>
					<span aria-hidden="true" class="breadcrumb_sep">›</span>';
				}
			}
			echo '<span>'.$title.'</span>
		</nav>
	</div>';

	echo '<div class="produkts">';
	echo '<div class="produkts-top">
		<div class="produkts-top-left">
			<img class="produkts-top-main-img" id="main-img" src="img/'.$images[0].'"/>
		</div>';
		echo '<div class="produkts-top-right">
			<h1 class="produkts-title">'.$title.'</h1>';
			if(!empty($color)){
				echo '<p class="produkts-p-text">Color</p>';
				foreach($color as $clr){
					echo '<div class="color-example" style="background-color:'.$clr.'"></div>';
				}
			}
			
		echo '<label for="size-example" class="produkts-p-text">Size</label>
			<select onchange="selectChange()" name="size-example" class="size-select" id="size-select">';
				foreach($price as $key => $value){
					echo '<option value="'.$value.'">'.$key.'</option>';
				}
			echo '</select>';

		if(count($price) > 1){
			$least = 999999;
			foreach($price as $prc){
				if($least > intval($prc)){
					$least = intval($prc);
				}
			}
			$least = '<strong>'.$least.'</strong>';
			$priceText = $least." €";
		} else {
			$priceText = $price['all'];
			if($priceText != '' && is_numeric($priceText)){
				$priceText = $priceText.' €';
			}
			$priceText = '<strong>'.$priceText.'</strong>';
		}
		echo '<div class="price-example" id="price" onload="selectChange()">'.$priceText.'</div>';
	echo '</div></div>';
	echo '<br/>
		<div class="produkts-top-img-container">';
			foreach($images as $img){
				echo '<div class="produkts-top-img" style="background-image:url(img/'.$img.');"></div>';
			}
			echo '</div>
					<h4 class="produkts-desc-title">Apraksts</h4>
					<p class="produkts-desc-p">'.$text.'</p>
				</div>';
			echo '<div>
					<h4 class="related-products">Saistītie produkti</h4>
				</div>';
			displayRelatedProducts($produkts[0]->ID, $db);	
	echo "</div>";
}

function displayRelatedProducts($id, $db){		
	$query = "SELECT * FROM kategorijas WHERE product = '".$id."' ORDER BY ID";
	$cat = $db->select($query);
	$category;
	foreach ($cat as $cat) {
		$category[] = $cat->category;
	}
	$category = array_unique($category);

	$queryText = '';
	foreach ($category as $key) {
		$queryText.= "'".$key."' OR ";
	}
	$queryText = substr($queryText, 0, strlen($queryText) - 4);

	$query = "SELECT * FROM kategorijas WHERE category = $queryText ORDER BY ID";
	$products = $db->select($query);
	$productsId='';
	foreach ($products as $key) {
		if($key != $id){
			$productsId[] = $key->product;
		}
	}
	$productsId = array_unique($productsId);
	$productsId = array_diff($productsId, array($id));

	$queryText = 'ID = ';
	$num = 0;
	foreach ($productsId as $key) {
		$queryText.= "'".$key."' OR ID = ";
	}
	$queryText = substr($queryText, 0, strlen($queryText) - 9);

	$query = "SELECT * FROM piedavajums WHERE $queryText ORDER BY ID DESC";	
	$prod = $db->select($query);

	echo '<div class="relative-products">';
	$num = count($prod);
	if($num>4){
		$num = 4;
	}
	for ($x = 0; $x < $num; $x++) {
		$images = unserialize($prod[$x]->images);
		$price = unserialize($prod[$x]->price);
		$priceText = '';	
		if(count($price) > 1){
			$least = 999999;
			foreach($price as $prc){
				if($least > intval($prc)){
					$least = intval($prc);
				}
			}

			$least = '<strong>'.$least.'</strong>';
			$priceText = "Sākot no ".$least." €";
		} else {
			$priceText = $price['all'];
			if($priceText != '' && is_numeric($priceText)){
				$priceText = $priceText.' €';
			}
			$priceText = '<strong>'.$priceText.'</strong>';
		}
		echo '<div class="rel-produkti"><a class="produkti" href="?p='.$prod[$x]->url.'">
				<div class="produkti-image" style="background-image:url(img/'.$images[0].')"></div>
				<p class="produkti-title">'.$prod[$x]->title.'</p>
				<p class="produkti-price">'.$priceText.'</p>
			</a></div>';
	}
	echo "</div>";
}
function displayAllProducts($db){
	echo '<div class="section-header section-header-breadcrumb">
		<nav class="breadcrumb">
			<a href="http://localhost/elliandhugo/" title="Back to frontpage">Sākums</a>
			<span aria-hidden="true" class="breadcrumb_sep">›</span>';
			if(!empty($path)){
				foreach($path as $tp){
					echo '<a href="#" title="Back to '.$tp.'">'.$tp.'</a>
					<span aria-hidden="true" class="breadcrumb_sep">›</span>';
				}
			}
			echo '<span>Viss piedāvājums</span>
		</nav>
	</div>';
	$query = "SELECT * FROM piedavajums ORDER BY ID DESC";
	$produkti = $db->select($query);
	foreach($produkti as $prod){
		$images = unserialize($prod->images);
		$title = $prod->title;
		$price = unserialize($prod->price);
		$priceText = '';
		if(count($price) > 1){
			$least = 999999;
			foreach($price as $prc){
				if($least > intval($prc)){
					$least = intval($prc);
				}
			}

			$least = '<strong>'.$least.'</strong>';
			$priceText = "Sākot no ".$least." €";
		} else {
			$priceText = $price['all'];
			if($priceText != '' && is_numeric($priceText)){
				$priceText = $priceText.' €';
			}
			$priceText = '<strong>'.$priceText.'</strong>';
		}
		echo '<a class="produkti" href="?p='.$prod->url.'">
				<div class="produkti-image" style="background-image:url(img/'.$images[0].')"></div>
				<p class="produkti-title">'.$title.'</p>
				<p class="produkti-price">'.$priceText.'</p>
			</a>';
	}
}

function displayFilteredProducts($produkti, $tag, $title, $db){
	if (strcmp($produkti, 'all') == 0 || strcmp($produkti, 'visi') == 0) {
		displayAllProducts($db);
	} else {
		echo '<div class="section-header section-header-breadcrumb">
			<nav class="breadcrumb">
				<a href="http://localhost/elliandhugo/" title="Back to frontpage">Sākums</a>
				<span aria-hidden="true" class="breadcrumb_sep">›</span>';
				if(!empty($path)){
					foreach($path as $tp){
						echo '<a href="#" title="Back to '.$tp.'">'.$tp.'</a>
						<span aria-hidden="true" class="breadcrumb_sep">›</span>';
					}
				}
				echo '<span class="capitalize">'.$title.'</span>
			</nav>
		</div>';
		$tag0 = 0;
		$tag1 = 9999999;
		if ($tag != '') {
			if(count(explode("-", $tag)) > 1){
				list($tag0, $tag1) = explode("-", $tag);			
			} else {
				if (strcmp($produkti, 'virs') == 0) {
					$tag0 = explode("-", $tag)[0];
				} else {
					$tag1 = explode("-", $tag)[0];
				}				
			}
		}

		$query = "SELECT * FROM piedavajums WHERE title = '$produkti' OR url = '$produkti' OR text like '$produkti' ORDER BY ID DESC";
		if(strcmp($produkti, 'zem') == 0 || strcmp($produkti, 'virs') == 0){
			$query = "SELECT * FROM piedavajums ORDER BY ID DESC";
		} 
		$batch2 = $db->select($query);
		displayProductInPage($batch2, $tag0, $tag1, $title);
		echo "<small class='view-more'><a href='?cat=all' title='Skatīt visu kolekciju'>Skatīt visus piedāvājumus</a></small>";
	}
}

function displayProductInPage($batch, $priceDownLimit, $priceUpLimit, $pageTitle){
	$dsp = false;
	if ($batch != 0) {
		foreach($batch as $prod){
			$images = unserialize($prod->images);
			$title = $prod->title;
			$price = unserialize($prod->price);
			$priceText = '';
			$display = false;
			$path[] = $pageTitle;
			if(count($price) > 1){
				$least = 999999;
				foreach($price as $prc){
					if($least > intval($prc)){
						$least = intval($prc);
					}
					if($prc > $priceDownLimit && $prc < $priceUpLimit){
						$display = true;
					}
				}
				$least = '<strong>'.$least.'</strong>';
				$priceText = "Sākot no ".$least." €";
			} else {
				$priceText = $price['all'];
				if($priceText != '' && is_numeric($priceText)){
					if($priceText > $priceDownLimit && $priceText < $priceUpLimit){
						$display = true;
					}
					$priceText = $priceText.' €';
				}
				$priceText = '<strong>'.$priceText.'</strong>';
			}
			if ($display == true) {
				$dsp = true;
				echo '<a class="produkti" href="?p='.$prod->url.'&path='.$path.'">
				<div class="produkti-image" style="background-image:url(img/'.$images[0].')"></div>
				<p class="produkti-title">'.$title.'</p>
				<p class="produkti-price">'.$priceText.'</p>
			</a>';
			}
		}
	}
	if(!$dsp){
		echo '<p class="error">Neatradās neviens produkts, kas atbilstu meklēšanas kritērijiem.</p>';
	}
}
?>