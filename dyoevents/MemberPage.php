<?php
require_once ("ValidateUser.php");
$vd = new ValidateUser();
session_start();

/*
$user = strtok($_SESSION['login'], '@');


//switch case shop

if(isset($_POST['Submit'])) {
     $oldpass= $_POST['opwd'];
     $useremail=$_SESSION['login'];
     $newpassword=md5($_POST['npwd']);

    if($vd->correctPassword($useremail,$oldpass,$newpassword)) {
        $_SESSION['msg1']="Password Changed Successfully !!";
    }
    else {
        $_SESSION['msg1']="Old Password not match !!";
    }
}
*/
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
    <script src="script.js"></script>
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
   
 
    <p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
<form name="chngpwd" action="" method="post" onSubmit="return valid();">
<table align="center">
    <tr height="50">
    <td>Old Password :</td>
        <td><input type="password" name="opwd" id="opwd"></td>
    </tr>
    <tr height="50">
        <td>New Passowrd :</td>
    <td><input type="password" name="npwd" id="npwd"></td>
    </tr>
    <tr height="50">
        <td>Confirm Password :</td>
    <td><input type="password" name="cpwd" id="cpwd"></td>
    </tr>
<tr>

<td><input type="submit" name="Submit" value="Change Passowrd" /></td>
</tr>
 </table>
</form>
</body>

    <!--
                        <td style="text-align:right;"><?php // echo "Fr " . number_format($item_price, 2); ?></td>

                    </tr>
                <?php/*
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"] * $item["quantity"]);

                    }
                       */
                ?>

                -->
        </main>
    </body>

    </html>

<?php
} else {
    session_destroy();
    header("Location: LogIn.html");
}
?>