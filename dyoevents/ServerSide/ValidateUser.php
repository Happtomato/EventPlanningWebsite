<?php

class ValidateUser{

    function userIsValid(){

        //create connection to db
        require_once("dbcontroller.php");
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];

        $sql = "SELECT UserPassword FROM UserAccounts WHERE UserLogin $userLogin";
        $hash = $conn->query($sql);

        $conn->close();

        if (password_verify($userPassword, $hash)) {
            return true;
        } else {
            return false;
        }

    }

    function getUserID($userLogin)
    {

        if ($this->userIsValid()) {

            //create connection to db
            require_once("dbcontroller.php");
            $db_handle = new DBController();

            $conn = $db_handle->connectDB();

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT User_ID FROM UserAccounts WHERE userLogin $userLogin";
            $result = $conn->query($sql);

            $conn->close();

            return $result;
        }
        echo "error";
        return "";
    }
}