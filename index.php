<?php
    namespace App;
    require "class/Autoloader.php";
    Autoloader::register();

    $db = new Database('blog2');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $req = $db->query("SELECT * FROM posts");

        var_dump($req);

    ?>
</body>
</html>