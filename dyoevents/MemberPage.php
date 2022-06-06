<?php
session_start();
if(isset($_SESSION['user_type'])) {
$user = strtok($_SESSION['login'], '@');
$userid = $_SESSION['login'];
$id = $_SESSION["id"];/* userid of the user */

if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from student WHERE name='" . $id . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
mysqli_query(connectDB(),"UPDATE student set password='" . $_POST["newPassword"] . "' WHERE name='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}

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
    <title>Member Page</title>
</head>

<body>
    <header>
        <li><img id="nav-title" src="Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
            <li><a href="MemberPage.php">Home</a></li>
            <li><a href="Events.php">Events</a></li>
            <li><a href="pictures.php">Bilder</a></li>
            <li><a href="aboutUs.php">Über uns</a></li>
            <li><a href="shop.php">Tickets</a></li>
            <li><a href="profilePage.php">Profil</a></li>
            <li><a href="index.html">Ausloggen</a></li>
        </ul>
        <!-- Nav Bar-->
        <!-- Nav Bar Mobile-->
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="MemberPage.php">Home</a>
                <a href="Events.php">Events</a>
                <a href="pictures.php">Bilder</a>
                <a href="aboutUs.php">Über uns</a>
                <a href="shop.php">Tickets</a>
            </div>
        </div>


        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-user"></i></button>
            <div class="dropdown-content">
                <a href="profilePage.php">Profil</a>
                <a href="index.html">Ausloggen</a>
            </div>
        </div>

        <!-- Nav Bar Mobile-->
    </header>
    <h1><?php echo "Hello ".$user ; ?></h1>
    <div id = "product-grid">
        <!--<div id = "txt-heading">Deine Produkte</div>!-->
    <br>
    <!--<?php
                $orders_array = $db_handle->runQuery("SELECT OrderDate FROM Orders");
                if (!empty($orders_array)) {
                    foreach ($orders_array as $key => $value) {
                ?>
                        <div class="event-item">
                            <form method="post" action="MemberPage.php?action=add&code=<?php echo $value["Order_ID"]; ?>">
                                <div><div class="event-date"><?php echo $value["OrderDate"]; ?></div></div>
                                <div class="event-tile-footer">
                                    <div class="event-title"><?php echo $value["Product_ID"]; ?></div>
                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }else{
                    echo $value["Product_ID"];
                }
                ?>
!-->
<h3 >CHANGE PASSWORD</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" >
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>
<br>

<br>
</body>

</html>

<?php
}
else{
    session_destroy();
    header("Location: LogIn.html");
}
?>