<?php
session_start();
setlocale(LC_CTYPE, 'lv_LV');


if(isset($_SESSION['id'])){    
    ?>
    <html lang="en">
        <head>
            <title></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
            <form method="post" enctype="multipart/form-data">
                <h2>Nosaukums</h2>
                <h2>Apraksts</h2>
                <h2>Nosaukums</h2>
                <h2>Nosaukums</h2>
                
            </form>
        </body>
    </html>
    <?php
} else {
    header("Location: http://elliandhugo.lv/testAdmin.php");
    die();
}
?>