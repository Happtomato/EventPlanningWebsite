<?php
require_once("DBController.php");
$db_handle = new DBController();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../Pictures/D-Logo.png" />
    <link rel="stylesheet" href="../ClientSide/stylesheet.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Events</title>
</head>

<body>
    <header>
    <li><a href="../ServerSide/MemberPage.php"><img id="nav-title" src="../Pictures/logo.png" sizes="20px"></a></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
        <li><a href="../ServerSide/Events.php">Events</a></li>
            <li><a href="../ServerSide/pictures.php">Pictures</a></li>
            <li><a href="../ClientSide/AboutUs.html">About Us</a></li>
            <li><a href="../ServerSide/shop.php">Tickets</a></li>
            <li><a href="../ServerSide/profilePage.php">Profile</a></li>
            <li><a href="../index.html">Log out</a></li>
        </ul>
        <!-- Nav Bar-->
        <!-- Nav Bar Mobile-->
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="../ServerSide/MemberPage.php">Home</a>
                <a href="../ServerSide/pictures.php">Pictures</a>
                <a href="../ClientSide/AboutUs.html">About Us</a>
                <a href="../ServerSide/shop.php">Tickets</a>
            </div>
        </div>


        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-user"></i></button>
            <div class="dropdown-content">
                <a href="../ServerSide/profilePage">Profile</a>
                <a href="../index.html">Log out</a>
            </div>
        </div>

        <!-- Nav Bar Mobile-->
    </header>

    <div class="txt-heading">Events</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM Events ORDER BY Event_ID ASC");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
    ?>
            <div class="event">
                <div class="product-tile-footer">
                    <div class="product-title"><?php echo $value["EventName"]; ?></div>
                    <div class="product-title"><?php echo $value["EventDescription"]; ?></div>
                    <div class="product-price"><?php echo $value["EventDate"]."fr"; ?></div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    </div>

</body>

</html>