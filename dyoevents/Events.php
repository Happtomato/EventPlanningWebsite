<?php
require_once("DBController.php");
$db_handle = new DBController();
session_start();
if(isset($_SESSION['user_type'])) {

?>

<!doctype html>
<html lang="en">

<HEAD>
    <TITLE>Events</TITLE>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="phpStyle.css" />
    <link rel="icon" type="image/png" href="Pictures/D-Logo.png" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

</HEAD>

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

    <div class="txt-heading">Events</div>
    
    </div>
     <div id="event-grid">
                
                <?php
                $event_array = $db_handle->runQuery("SELECT * FROM Events ORDER BY Event_ID ASC");
                if (!empty($event_array)) {
                    foreach ($event_array as $key => $value) {
                ?>
                        <div class="event-item">
                            <form method="post" action="Events.php?action=add&code=<?php echo $value["Event_ID"]; ?>">
                                <div><div class="event-date"><?php echo $value["EventDate"]; ?></div></div>
                                <div class="event-tile-footer">
                                    <div class="event-title"><?php echo $value["EventName"]; ?></div>
                                    <div class="event-description"><?php echo $value["EventDescription"]; ?></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

</body>

</html>

    <?php
}
else{
    session_destroy();
    header("Location: LogIn.html");
}
?>