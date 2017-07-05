<?php
        session_start();
	error_reporting(E_ALL);
        ini_set('display_errors',1);
        
        if(isset($_SESSION['id'])){    
                $menuErr = $submenuErr = "";
                $menu = $submenu = array();
                if(!empty($_POST)){
                        
                        function test_input($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                        }
                        
                        
                        
                        //require_once('insert-db.php');
                        //$insert->menu($menu, $submenu);                        
                }
        
?>
<hmtl>
	<head>
		<title>Insert menu</title>
                <style>
                        .sub-menu{
                                display:block;
                                margin-left: 3em;
                        }
                        .sub-menu > input{
                                display:block;
                        }
                        .submenu{
                                display: flex;
                        }
                        .bttn{
                                display:block;
                                padding: 2px;
                                margin: 0.5em 0;
                        }
                        #submit{
                                margin-top: 1em;
                        }
                </style>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
                        <div id='main-menu'></div>
                        <button id='add-menu' class='bttn' type='button'>Add menu item</button>
                        <button id='submit' type='submit' class='bttn'>Submit</button>
		</form>
                <script>
                        var btnAdd = document.getElementById('add-menu');
                        var placeP = document.getElementById('main-menu');
                        
                        btnAdd.onclick = function(){
                                var tempDiv = document.createElement("DIV");
                                tempDiv.className += "menu";
                                var tempOthDiv = document.createElement("DIV");
                                tempOthDiv.className += "sub-menu";
                                var tempInp = document.createElement("INPUT");
                                tempInp.type = 'text';
                                tempInp.name = 'menu' + placeP.childElementCount;
                                var tempBttn = document.createElement("BUTTON");
                                tempBttn.type = 'button';
                                tempBttn.innerHTML = 'Add sub menu';
                                tempBttn.onclick = function(){
                                        var tempSubDiv = document.createElement("DIV");
                                        tempSubDiv.className += "submenu";
                                        var tempInpt = document.createElement('INPUT');
                                        tempInpt.type='text';
                                        tempInpt.name = this.parentNode.parentNode.childNodes[0].name + "submenu" + (this.parentNode.childElementCount - 1);
                                        var tempSubBttn = document.createElement("BUTTON");
                                        tempSubBttn.type = 'button';
                                        tempSubBttn.innerHTML = 'X';                                        
                                        tempSubBttn.onclick = function(){
                                                var chldcount = this.parentNode.parentNode.childElementCount;
                                                chldcount--;
                                                for(var i = 0; i < chldcount; i++){
                                                        var subMenuName = this.parentNode.parentNode.childNodes[i].childNodes[0].name;
                                                        console.log(subMenuName);
                                                        var prntchldcount = this.parentNode.parentNode.childElementCount;
                                                        prntchldcount-=2;
                                                        console.log(prntchldcount);
                                                        //for(var j = 0; j < prntchldcount; j--){
                                                                 //subMenuName =  menuName + "submenu" + (j);
                                                        //}
                                                        
                                                }
                                                this.parentNode.parentNode.removeChild(this.parentNode);
                                        }
                                        tempSubDiv.appendChild(tempInpt);
                                        tempSubDiv.appendChild(tempSubBttn);
                                        var chldcount = this.parentNode.childElementCount;
                                        chldcount--;
                                        this.parentNode.insertBefore(tempSubDiv, this.parentNode.childNodes[chldcount]);
                                }
                                tempDiv.appendChild(tempInp);
                                tempOthDiv.appendChild(tempBttn);
                                tempDiv.appendChild(tempOthDiv);
                                placeP.appendChild(tempDiv);
                        }
                        btnAdd.click();
                        
                        function hasClass(element, cls) {
                                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
                        }
                </script>
	</body>
</hmtl>
<?php
        } else {
                header("Location: http://karlismendzins.co.nf/elli&hugo/admin/login.php");
                die();
        }
?>