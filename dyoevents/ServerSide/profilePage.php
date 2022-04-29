<?php

require_once ("DBController.php");

$dbHandle = new dbcontroller();


function changeEmail(){

}
function changePassword(){

}
function deleteAccount(){

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../ClientSide/stylesheet.css" />
    <link rel="icon" type="image/png" href="../Pictures/D-Logo.png" />
    <title>Profile</title>
</head>
<body>
<header>
      <li><img id="nav-title" src="../Pictures/logo.png" sizes="20px"></li>
      <!-- Nav Bar-->
      <ul>
            <li><a href="../ServerSide/MemberPage.php">Home</a></li>
            <li><a href="../ServerSide/Events.php">Events</a></li>
            <li><a href="../ServerSide/pictures.php">Pictures</a></li>
            <li><a href="../ClientSide/gallery.html">Gallery</a></li>
            <li><a href="../ClientSide/AboutUs.html">About Us</a></li>
            <li><a href="../ServerSide/shop.php">Tickets</a></li>
            <li><a href="../index.html">Log out</a></li>
      </ul>
      <!-- Nav Bar-->
  </header>
</body>
</html>

