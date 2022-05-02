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
    <title>Document</title>
</head>
<body>

<div id="product-grid">
    <div class="txt-heading">Products</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM Pictures ORDER BY Item_ID ASC");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                    <div class="product-image"><img src="../Pictures/D-Logo.png"></div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $product_array[$key]["PictureName"]; ?></div>
                    </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</div>

</body>
</html>