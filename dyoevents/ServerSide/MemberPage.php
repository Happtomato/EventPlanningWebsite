<?php

if($_SESSION["userType"] != "User") {
    //header("Location: ../ClientSide/LogIn.html");
}


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
    <title>Member Page</title>
</head>

<body>
    <header>
        <li><img id="nav-title" src="../Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
            <li><a href="../ServerSide/MemberPage.php">Home</a></li>
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
                <a href="../ServerSide/Events.php">Events</a>
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

</body>

</html>