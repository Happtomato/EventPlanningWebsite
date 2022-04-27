<?php
require_once ("createNewUser.php");

//compare passwords

            $login = $_GET["login"];
            $number = $_GET["number"];
            $password = $_GET["password"];
            $confirmedPW = $_GET["confirmPassword"];

            if (!strcmp($password,$confirmedPW)) {
                echo "User will be created";
                createUser($login,$number, $password);
            } else {
                echo "The Passwords do not match!";
                include_once('../ClientSide/signUpForm.html');

        }
