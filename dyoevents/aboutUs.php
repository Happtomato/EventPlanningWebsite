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
    <script src="https://kit.fontawesome.com/7d9d59c948.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="Pictures/D-Logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">

    <title>About Us</title>
</head>

<body>
<header>
<li><img id="nav-title" src="Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
            <li><a href="MemberPage.php">Home</a></li>
            <li><a href="Events.php">Events</a></li>
            <li><a href="pictures.php">Pictures</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
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
                <a href="aboutUs.php">About Us</a>
                <a href="shop.php">Tickets</a>
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

    <main>
        <div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1>Über uns</h1>
                    </div>
                    <div class="content">
                        <h3> Dyoevents veranstaltet Partys im ganzen Aargau!</h3>
                        <p>
                            In einem Team von drei Leuten organisieren wir seit Januar 2022 Events in Clubs und Waldhäusern.
                            Angefangen hat es im Waldhaus Staufen mit ungefähr 30 Teilnehmern. Inzwischen sind wir bereits 80 und haben zuletzt 
                            im Flösserplatz Aarau gefeiert. Wir freuen uns, in Zukunft weitere Partys an den verschiedensten Orten zu schmeissen.
                        </p>
                        <a
                            href="https://eventfrog.ch/de/p/party/studentenparty/staufen-27-05-2022-by-dyoevents-6924694918376824431.html">
                            <p>Interessiert? Dann sichere jetzt dein Ticket
                                für die nächste Party!</p>
                        </a>
                        <p>Fragen? Schreib uns auf WhatsApp, Instagram oder per Mail:</p>

                    </div>
                    <div class="social">
                        
                        <a href="https://chat.whatsapp.com/CoG6rfLFqCa0LwHg7K5Doy"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/dyoevents/"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:info@dyoevents.ch"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
                <div class="image-section">
                    <img class="img-staufen" src="../Pictures/aboutusstaufen.jpg">
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
    header("Location: LogIn.html");
}
?>