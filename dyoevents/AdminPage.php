<?php
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
            <li><a href="pictures.php">Bilder</a></li>
            <li><a href="shop.php">Tickets</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="profilePage.php">Profil</a></li>
            <li><a href="index.html">Ausloggen</a></li>
        </ul>
        <!-- Nav Bar-->
        <!-- Nav Bar Mobile-->
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="MemberPage.php">Home</a>
                <a href="pictures.php">Bilder</a>
                <a href="shop.php">Tickets</a>
                <a href="upload.php">Upload</a>
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


    <!-- Form Create Event -->
    <form class="modal-content animate" action="SignUpForm.php" method="post">
        <div class="container">
            <label for="login"><b>E-mail Adresse</b></label>
            <input type="email" placeholder="E-mail Adresse eingeben" name="login" required>
            <label for="number"><b>Telefonnummer</b></label>
            <input type="tel" placeholder="Telefonnummer eingeben" name="number" required>
            <label for="password"><b>Passwort</b></label>
            <input type="password" placeholder="Passwort eingeben" name="password" required>
            <label for="confirmPassword"><b>Passwort kontrollieren</b></label>
            <input type="password" placeholder="Passwort erneut eingeben" name="confirmPassword" required>

            <button type="submit">Registrieren</button>
    </form>
    <!-- Form Delete Event -->
    <form class="modal-content animate" action="SignUpForm.php" method="post">
        <div class="container">
            <label for="login"><b>E-mail Adresse</b></label>
            <input type="email" placeholder="E-mail Adresse eingeben" name="login" required>
            <label for="number"><b>Telefonnummer</b></label>
            <input type="tel" placeholder="Telefonnummer eingeben" name="number" required>
            <label for="password"><b>Passwort</b></label>
            <input type="password" placeholder="Passwort eingeben" name="password" required>
            <label for="confirmPassword"><b>Passwort kontrollieren</b></label>
            <input type="password" placeholder="Passwort erneut eingeben" name="confirmPassword" required>

            <button type="submit">Registrieren</button>
    </form>
    <!-- Form Promote User -->
    <form class="modal-content animate" action="SignUpForm.php" method="post">
        <div class="container">
            <label for="login"><b>E-mail Adresse</b></label>
            <input type="email" placeholder="E-mail Adresse eingeben" name="login" required>
            <label for="number"><b>Telefonnummer</b></label>
            <input type="tel" placeholder="Telefonnummer eingeben" name="number" required>
            <label for="password"><b>Passwort</b></label>
            <input type="password" placeholder="Passwort eingeben" name="password" required>
            <label for="confirmPassword"><b>Passwort kontrollieren</b></label>
            <input type="password" placeholder="Passwort erneut eingeben" name="confirmPassword" required>

            <button type="submit">Registrieren</button>
    </form>
    <!-- Form Delete User -->
    <form class="modal-content animate" action="SignUpForm.php" method="post">
        <div class="container">
            <label for="login"><b>E-mail Adresse</b></label>
            <input type="email" placeholder="E-mail Adresse eingeben" name="login" required>
            <label for="number"><b>Telefonnummer</b></label>
            <input type="tel" placeholder="Telefonnummer eingeben" name="number" required>
            <label for="password"><b>Passwort</b></label>
            <input type="password" placeholder="Passwort eingeben" name="password" required>
            <label for="confirmPassword"><b>Passwort kontrollieren</b></label>
            <input type="password" placeholder="Passwort erneut eingeben" name="confirmPassword" required>

            <button type="submit">Registrieren</button>
    </form>
    <!-- Form Delete Picture -->
    <form class="modal-content animate" action="SignUpForm.php" method="post">
        <div class="container">
            <label for="login"><b>E-mail Adresse</b></label>
            <input type="email" placeholder="E-mail Adresse eingeben" name="login" required>
            <label for="number"><b>Telefonnummer</b></label>
            <input type="tel" placeholder="Telefonnummer eingeben" name="number" required>
            <label for="password"><b>Passwort</b></label>
            <input type="password" placeholder="Passwort eingeben" name="password" required>
            <label for="confirmPassword"><b>Passwort kontrollieren</b></label>
            <input type="password" placeholder="Passwort erneut eingeben" name="confirmPassword" required>

            <button type="submit">Registrieren</button>
    </form>

</body>

</html>


<?php
}
else{
    session_destroy();
    header("Location: LogIn.html");
}
?>