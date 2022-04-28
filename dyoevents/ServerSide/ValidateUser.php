<?php

class ValidateUser{

    function userIsValid($userLogin,$userPassword){

        //create connection to db
        require_once("dbcontroller.php");
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT UserPassword FROM UserAccounts WHERE UserLogin $userLogin";
        $hash = $conn->query($sql);

        $conn->close();

        if (password_verify($userPassword, $hash)) {
            if($this->getUserType($userLogin) == "admin"){
                include "AdminPage.php";
            }
            else{
                include "MemberPage.php";
            }
        } else {
            echo "Benutzer wurde nicht gefunden";
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
    function getUserType($userLogin)
    {
            //create connection to db
            require_once("dbcontroller.php");
            $db_handle = new DBController();

            $conn = $db_handle->connectDB();

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT userType FROM UserAccounts WHERE userLogin $userLogin";
            $result = $conn->query($sql);

            $conn->close();

            return $result;

        echo "error";
        return "";
    }
}