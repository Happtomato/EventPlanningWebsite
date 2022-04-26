<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
</head>
<body>

<div class="txt-heading">Events</div>
<?php
$product_array = $db_handle->runQuery("SELECT * FROM Events ORDER BY Event_ID ASC");
if (!empty($product_array)) {
    foreach($product_array as $key=>$value){
        ?>
        <div class="event">
                <div class="product-tile-footer">
                    <div class="product-title"><?php echo $product_array[$key]["EventName"]; ?></div>
                    <div class="product-title"><?php echo $product_array[$key]["EventDescription"]; ?></div>
                    <div class="product-price"><?php echo $product_array[$key]["EventDate"]."fr"; ?></div>
                </div>
        </div>
        <?php
    }
}
?>
</div>

</body>
</html>
