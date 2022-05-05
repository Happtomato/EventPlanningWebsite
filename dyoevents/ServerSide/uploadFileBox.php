<?php
session_start();
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin") {
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="phpStyle.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../ClientSide/script.js"></script>
    <title>Upload</title>
</head>
<body>

<h2 id="Title">Drag your XML file into the box</h2>

<div id="dropBox" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
    <p id="dropBoxText">Drag file here</p>
</div>




</body>
</html>

<?php
}
else{
    session_destroy();
    header("Location: ../ClientSide/LogIn.html");
}
?>
