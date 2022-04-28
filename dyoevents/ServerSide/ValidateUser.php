<?php

class ValidateUser{
    function userIsValid($userLogin,$userPassword){

        echo "test";
        //create connection to db
        require_once("DBController.php");
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "test";

        $sql = "SELECT UserPassword FROM `UserAccounts` WHERE UserLogin = '$userLogin'";
        $result = $conn->query($sql);
        $conn->close();

        echo "test";
        $hashArray = $result->fetch_all();
        echo "test";
        $hash = $hashArray[0][0];
        echo "test";
        echo $hash;
        if (password_verify($userPassword,$hash)) {

            if($this->getUserType($userLogin) == "admin"){
                $this->user = new currentUser($userLogin,$userPassword);
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

            $sql = "SELECT User_ID FROM UserAccounts WHERE userLogin = '$userLogin'";


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

            $sql = "SELECT userType FROM UserAccounts WHERE userLogin = '$userLogin'";
            $result = $conn->query($sql);

            $conn->close();

            return $result;

        echo "error";
        return "";
    }
}