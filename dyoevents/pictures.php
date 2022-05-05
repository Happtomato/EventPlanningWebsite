<?php
require_once("DBController.php");
$db_handle = new DBController();
session_start();
if(isset($_SESSION['user_type'])) {

    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="Pictures/D-Logo.png" />
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Document</title>
</head>

<body>
    <header>
        <li><img id="nav-title" src="Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
        <li><a href="Events.php">Events</a></li>
            <li><a href="pictures.php">Pictures</a></li>
            <li><a href="../ClientSide/AboutUs.html">About Us</a></li>
            <li><a href="shop.php">Tickets</a></li>
            <li><a href="profilePage.php">Profile</a></li>
            <li><a href="index.html">Log out</a></li>
        </ul>
        <!-- Nav Bar-->
        <!-- Nav Bar Mobile-->
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="MemberPage.php">Home</a>
                <a href="Events.php">Events</a>
                <a href="../ClientSide/AboutUs.html">About Us</a>
                <a href="shop.php">Tickets</a>
            </div>
        </div>


        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-user"></i></button>
            <div class="dropdown-content">
                <a href="../ServerSide/profilePage">Profile</a>
                <a href="index.html">Log out</a>
            </div>
        </div>

        <!-- Nav Bar Mobile-->
    </header>
<div id="product-grid">
    <div class="txt-heading">Pictures</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM Pictures ORDER BY Picture_ID ASC");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                    <div class="product-image"><img src="<?php echo $value["PictureURL"]; ?>"></div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $value["PictureName"]; ?></div>
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

<?php
}
else{
    session_destroy();
    header("Location: ../ClientSide/LogIn.html");
}
?>