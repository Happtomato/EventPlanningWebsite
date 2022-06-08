<?php
session_start();
if (isset($_SESSION['user_type'])) {
    $user = strtok($_SESSION['login'], '@');
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
        <main>
            <h1><?php echo "Hello " . $user; ?></h1>
            <div id="product-grid">
                <div id="txt-heading">Deine Produkte</div>
                <br>
                <?php
                foreach ($_SESSION["cart_item"] as $item) {
                    $item_price = $item["quantity"] * $item["price"];
                ?>

                    <tr>
                        <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["code"]; ?></td>
                        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>

                        <td style="text-align:right;"><?php echo "Fr " . number_format($item_price, 2); ?></td>

                    </tr>
                <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"] * $item["quantity"]);
                }
                ?>
        </main>
    </body>

    </html>

<?php
} else {
    session_destroy();
    header("Location: LogIn.html");
}
?>