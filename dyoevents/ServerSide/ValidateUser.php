<?php

require_once ("currentUser.php");
class ValidateUser{

    public $user = null;


    function userIsValid($userLogin,$userPassword){

        //create connection to db
        require_once("DBController.php");
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT UserPassword FROM `UserAccounts` WHERE UserLogin = '$userLogin'";
        $result = $conn->query($sql);
        $conn->close();


        $hashArray = $result->fetch_all();
        $hash = $hashArray[0][0];
        if (password_verify($userPassword,$hash)) {


            if($this->getUserType($userLogin) == "admin"){
                $user = new currentUser($userLogin,$userPassword);

                echo "admin da";
                header("Location: AdminPage.php");

            }
            else{
                echo "user da";
                header("Location: MemberPage.php");
            }
        } else {
            echo "Benutzer wurde nicht gefunden";
            header("Location: ../ClientSide/LogIn.html");
        }

    }
    function getUserType($userLogin)
    {
        //create connection to db
        require_once("DBController.php");
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT userType FROM UserAccounts WHERE UserLogin = '$userLogin'";
        $result = $conn->query($sql);

        $conn->close();

        $resultArray = $result->fetch_all();
        return $resultArray[0][0];


        echo "error";
        return "";
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

}