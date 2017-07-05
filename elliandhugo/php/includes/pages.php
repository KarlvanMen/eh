<?php
	function showPage($page, $db){
		echo "<div class='pages'>";
		switch ($page) {
			case 'aboutus':
				displayAboutUs();
				break;
			case 'jauta':
				displayFAQ();
				break;	
			case 'misija':
				displayVnM();
				break;			
			default:
				header("Location: http://localhost/elliandhugo/");
				die();
		}
		echo "</div>";
	}

	function displayAboutUs(){
		echo '<h1 class="section-header">Par mums</h1>';
		echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie justo erat, vel tincidunt nulla vulputate sit amet. Donec eget lectus odio. Proin vulputate aliquet nisl, quis egestas turpis molestie nec. Nulla quis dui id lectus tincidunt dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. <b>Integer non vestibulum eros, eget faucibus lacus. Curabitur lacinia ante eu imperdiet sodales.</b> Suspendisse malesuada tellus at turpis cursus, sed sollicitudin ex facilisis. <b><i>Morbi a est ultrices, sodales ligula lacinia, sodales justo.</b></i> Quisque arcu turpis, pharetra eget commodo at, fringilla non nisi. Vestibulum tellus quam, mattis et faucibus at, dictum aliquam leo. Vivamus ultricies facilisis accumsan. Vestibulum eget quam et est elementum aliquam sit amet vel massa.</p>';
		echo '<img src="img/aboutus.jpg" />';
	}

	function displayFAQ(){
		echo '<h1 class="section-header">Biežāk uzdotie jautājumi</h1>';
		echo '<b>Kad būs mājaslapa gatava?</b><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie justo erat, vel tincidunt nulla vulputate sit amet. Donec eget lectus odio. Proin vulputate aliquet nisl, quis egestas turpis molestie nec. Nulla quis dui id lectus tincidunt dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. <b>Integer non vestibulum eros, eget faucibus lacus. Curabitur lacinia ante eu imperdiet sodales.</b> Suspendisse malesuada tellus at turpis cursus, sed sollicitudin ex facilisis. <b><i>Morbi a est ultrices, sodales ligula lacinia, sodales justo.</b></i> Quisque arcu turpis, pharetra eget commodo at, fringilla non nisi. Vestibulum tellus quam, mattis et faucibus at, dictum aliquam leo. Vivamus ultricies facilisis accumsan. Vestibulum eget quam et est elementum aliquam sit amet vel massa."</p>';
	}

	function displayVnM(){
		echo '<h1 class="section-header">Vīzija un Misija</h1>';
		echo '<p class="title"><b>Vīzija</b></p>';
		echo '<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie justo erat, vel tincidunt nulla vulputate sit amet. Donec eget lectus odio. Proin vulputate aliquet nisl, quis egestas turpis molestie nec. Nulla quis dui id lectus tincidunt dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. <b>Integer non vestibulum eros, eget faucibus lacus. Curabitur lacinia ante eu imperdiet sodales.</b> Suspendisse malesuada tellus at turpis cursus, sed sollicitudin ex facilisis. <b><i>Morbi a est ultrices, sodales ligula lacinia, sodales justo.</b></i> Quisque arcu turpis, pharetra eget commodo at, fringilla non nisi. Vestibulum tellus quam, mattis et faucibus at, dictum aliquam leo. Vivamus ultricies facilisis accumsan. Vestibulum eget quam et est elementum aliquam sit amet vel massa."</p>';
		echo '<p class="title"><b>Misija</b></p>';
		echo '<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie justo erat, vel tincidunt nulla vulputate sit amet. Donec eget lectus odio. Proin vulputate aliquet nisl, quis egestas turpis molestie nec. Nulla quis dui id lectus tincidunt dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. <b>Integer non vestibulum eros, eget faucibus lacus. Curabitur lacinia ante eu imperdiet sodales.</b> Suspendisse malesuada tellus at turpis cursus, sed sollicitudin ex facilisis. <b><i>Morbi a est ultrices, sodales ligula lacinia, sodales justo.</b></i> Quisque arcu turpis, pharetra eget commodo at, fringilla non nisi. Vestibulum tellus quam, mattis et faucibus at, dictum aliquam leo. Vivamus ultricies facilisis accumsan. Vestibulum eget quam et est elementum aliquam sit amet vel massa."</p>';
	}
?>