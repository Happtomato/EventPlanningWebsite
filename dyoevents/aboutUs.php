<?php

session_start();
if(isset($_SESSION['user_type'])) {

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="icon" type="image/png" href="Pictures/D-Logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">

    <title>About Us</title>
</head>

<body>
<header>
    <li><a href="MemberPage.php"><img id="nav-title" src="Pictures/logo.png" sizes="20px"></a></li>
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
            <a href="pictures.php">Pictures</a>
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

<main>
    <div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1>Über uns</h1>
                </div>
                <div class="content">
                    <h3> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, suscipit consectetur
                        magni,</h3>
                    <p>vero corrupti eaque ipsam consequatur at aperiam tenetur, inventore temporibus ut quas sunt
                        dolore
                        accusantium totam? Maxime itaque laboriosam temporibus eos expedita quia at numquam maiores,
                        pariatur
                        voluptatem omnis quaerat veniam nulla quibusdam hic perspiciatis aut nobis ducimus beatae,
                        animi porro
                        unde impedit modi. Eveniet, vel? Id, nam dolore ipsam placeat error ipsum veniam soluta
                        officia ad molestiae
                        temporibus eaque libero beatae iste, nisi vel a dicta neque quidem rerum rem. Vel obcaecati,
                        quisquam nisi nemo,
                        eaque totam magnam pariatur enim aut omnis, quo tenetur? Itaque accusantium ex in ut tenetur
                        harum a saepe ratione
                        quasi aut id, eos consectetur, fugit error sint, asperiores reprehenderit fugiat quibusdam
                        dolorem porro nostrum</p>
                    <a
                        href="https://eventfrog.ch/de/p/party/studentenparty/staufen-27-05-2022-by-dyoevents-6924694918376824431.html">
                        <p>Interessiert? Dann sichere jetzt dein Ticket
                            für die nächste Party!</p>
                    </a>

                </div>
                <div class="social">
                    <a href="https://www.instagram.com/dyoevents/"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:dyoevents.info@gmail.com"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="image-section">
                <img class="img-staufen" src="Pictures/aboutusstaufen.jpg">
            </div>
        </div>
    </div>
</main>
</body>

</html>

<?php
}
else{
    session_destroy();
    header("Location: ../ClientSide/LogIn.html");
}
?>