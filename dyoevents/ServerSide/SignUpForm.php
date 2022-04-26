<?php

require_once("dbcontroller.php");
require_once ("createNewUser.php");
$db_handle = new DBController();


if(!empty($_GET["action"])) {


    switch ($_GET["action"]) {

//compare passwords
        case "comparePassword":
            $login = $_GET["login"];
            $number = $_GET["number"];
            $password = $_GET["password"];
            $confirmedPW = $_GET["confirmPassword"];

            if ($password == $confirmedPW) {
                createUser($login,$number, $password);
            } else {
                echo("The Passwords do not match!");
                header("../ClientSide/signUpForm");
            }
    }
}
?>
