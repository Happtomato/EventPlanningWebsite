<?php

require_once("dbcontroller.php");
require_once ("createNewUser.php");
$db_handle = new DBController();

//manipulate the shopping cart

if(!empty($_GET["action"])) {


switch($_GET["action"]) {

//compare passwords
    case "comparePassword":
        $login = $_GET["login"];
        $password = $_GET["password"];
        $confirmedPW = $_GET["confirmPassword"];

        if($password == $confirmedPW){
            createUser($login,$password);
        }
        else{
            echo("The Passwords do not match!");
        }
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
</head>
<body>

    <div id="SignUpFormBorder">
        <div id="SignUpBoxes">
            <form action="../ServerSide/SignUpForm.php?action=comparePassword" method="post">
                <p>Passwort: <input type="password" name="password" /></p>
                <p>Passwort Bestätigen: <input type="password" name="confirmPassword" /></p>
            </form>
        </div>
    </div>

</body>
</html>