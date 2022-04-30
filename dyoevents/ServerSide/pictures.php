<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../Pictures/D-Logo.png" />
    <link rel="stylesheet" href="../ClientSide/stylesheet.css" />
    <title>Document</title>
</head>
<body>
<header>
    <li><img id="nav-title" src="../Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul>
            <li><a href="../ServerSide/MemberPage.php">Home</a></li>
            <li><a href="../ServerSide/Events.php">Events</a></li>
            <li><a href="../ClientSide/gallery.html">Gallery</a></li>
            <li><a href="../ClientSide/AboutUs.html">About Us</a></li>
            <li><a href="../ServerSide/shop.php">Tickets</a></li>
            <li><a href="../ServerSide/profilePage">Profile</a></li>
            <li><a href="../index.html">Log out</a></li>
        </ul>
        <!-- Nav Bar-->
    </header>
<div id="product-grid">
    <div class="txt-heading">Products</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM Pictures ORDER BY Item_ID ASC");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                    <div class="product-image"><img src="<?php echo $product_array[$key]["PictureURL"]; ?>"></div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $product_array[$key]["PictureName"]; ?></div>
                    </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</div>

</body>
</html>