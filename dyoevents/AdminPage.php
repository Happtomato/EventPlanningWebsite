<?php
require_once("DBController.php");
$db_handle = new DBController();

function createEvent($eventName,$eventDate,$event){

}
function createNewAdmin($username){

}
function deleteEvent($eventName){

}
function deleteUser($username){

}
function uploadPicture()
{

}
function deletePicture()
{

}


session_start();
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin") {

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
    <title>Admin Panel</title>
</head>

<body>
    <header>
    <li><img id="nav-title" src="Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
            <li><a href="AdminPage.php">Home</a></li>
            <li><a href="pictures.php">Pictures</a></li>
            <li><a href="shop.php">Tickets</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="profilePage.php">Profile</a></li>
            <li><a href="index.html">Log out</a></li>
        </ul>
        <!-- Nav Bar-->
        <!-- Nav Bar Mobile-->
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="MemberPage.php">Home</a>
                <a href="pictures.php">Pictures</a>
                <a href="shop.php">Tickets</a>
                <a href="upload.php">Upload</a>
            </div>
        </div>


        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-user"></i></button>
            <div class="dropdown-content">
                <a href="profilePage.php">Profile</a>
                <a href="index.html">Log out</a>
            </div>
        </div>

        <!-- Nav Bar Mobile-->
    </header>
</body>

</html>


<?php
}
else{
    session_destroy();
    header("Location: LogIn.html");
}
?>