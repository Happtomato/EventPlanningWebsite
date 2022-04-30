<?php
session_start();
require_once("DBController.php");
$db_handle = new DBController();

//manipulate the shopping cart

if(!empty($_GET["action"])) {


    switch($_GET["action"]) {

        //add a new item to the shopping cart
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM Articles WHERE Product_ID ='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["Product_ID"]=>array('name'=>$productByCode[0]["ProductName"], 'code'=>$productByCode[0]["Product_ID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["ProductPrice"], 'image'=>$productByCode[0]["ProductImage"]));

                //look if any item is in the basket
                if(!empty($_SESSION["cart_item"])) {
                    //look if item already in the basket
                    if(in_array($productByCode[0]["Product_ID"],array_keys($_SESSION["cart_item"]))) {
                        //go through array
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            //search for item
                            if($productByCode[0]["Product_ID"] == $k) {
                                //if empty set quantity 0
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                //add to quantity
                                else{
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        }
                        //add a new item into the session
                    } else {
                        $_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;

                    }
                    //start a new session
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        //remove item from the shopping cart
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        //remove session if the shopping cart is empty
        case "empty":
            unset($_SESSION["cart_item"]);
            break;

        case "checkout":
            header("Location: ../account.html");
            exit;
    }


}
?>


<HTML>
<HEAD>
    <TITLE>Simple PHP Shopping Cart</TITLE>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="phpStyle.css" type="text/css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../Pictures/D-Logo.png" />
    <style>
        html, body { overflow: visible !important; }
    </style>
</HEAD>
<BODY>

<header>
        <li><img id="nav-title" src="../Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul>
            <li><a href="../ServerSide/MemberPage.php">Home</a></li>
            <li><a href="../ServerSide/Events.php">Events</a></li>
            <li><a href="../ServerSide/pictures.php">Pictures</a></li>
            <li><a href="../ClientSide/AboutUs.html">About Us</a></li>
            <li><a href="../ServerSide/profilePage">Profile</a></li>
            <li><a href="../index.html">Log out</a></li>
        </ul>
        <!-- Nav Bar-->
    </header>


<main class="row" style="width: 100vw; height: 100vh;">

    <div class="col-2" id="index-left-img">

    </div>

    <div class="col-8" id="">   <!-- Start of middle col -->
        <!-- Shopping Cart -->
        <div id="shopping-cart">
            <div class="txt-heading">Shopping Cart</div>

            <a id="btnEmpty" href="shop.php?action=empty">Empty Cart</a>
            <?php
            if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
                ?>
                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Code</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item){
                        $item_price = $item["quantity"]*$item["price"];
                        ?>
                        <!-- List the item in the shopping cart -->
                        <tr>
                            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                            <td><?php echo $item["code"]; ?></td>
                            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                            <td  style="text-align:right;"><?php echo "Fr ".$item["price"]; ?></td>
                            <td  style="text-align:right;"><?php echo "Fr ". number_format($item_price,2); ?></td>
                            <!-- button remove item -->
                            <td style="text-align:center;"><a href="shop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="../Pictures/icon-delete.png" alt="Remove Item" style="width: 25px" /></a></td>
                        </tr>
                        <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"]*$item["quantity"]);
                    }
                    ?>

                    <tr>
                        <!-- display the total amount -->
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "Fr ".number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

                <a id="btnEmpty" href="shop.php?action=checkout">Checkout</a>

                <?php
            } else {
                ?>
                <div class="no-records">Your Cart is Empty</div>
                <?php
            }
            ?>
        </div>
        <!-- List of Products -->

        <div id="product-grid">
            <div class="txt-heading">Products</div>
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM Articles ORDER BY Product_ID ASC");
            if (!empty($product_array)) {
                foreach($product_array as $key=>$value){
                    ?>
                    <div class="product-item">
                        <form method="post" action="shop.php?action=add&code=<?php echo $value["Product_ID"]; ?>">
                            <div class="product-image"><img  src="<?php echo $value["ProductImage"];?>"></div>
                            <div class="product-tile-footer">
                                <div class="product-title"><?php echo $value["ProductName"]; ?></div>
                                <div class="product-price"><?php echo $value["ProductPrice"]."fr"; ?></div>
                                <div class="product-description"><?php echo $value["ProductDescription"]; ?></div>
                                <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div> <!-- End middle col -->

    <div class="col-2" id="index-right-backimg">

    </div>

</main>
</BODY>
</HTML>