<?php
session_start();

require_once("currentUser.php");

class ValidateUser{

    function userIsValid($userLogin,$userPassword){

        //create connection to db
        require_once("DBController.php");
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT UserPassword FROM UserAccounts WHERE UserLogin = ?");
        $stmt->bind_param("s", $userLogin);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();


        $hashArray = $result->fetch_all();
        $hash = $hashArray[0][0];

        if (password_verify($userPassword,$hash)) {


            if($this->getUserType($userLogin) == "admin"){

                $_SESSION['login'] = $userLogin;

                $_SESSION['pw'] = $userPassword;

                $_SESSION['user_type'] = "admin" ;

                header("Location: AdminPage.php");

            }
            else{

                $_SESSION['login'] = $userLogin;

                $_SESSION['pw'] = $userPassword;

                $_SESSION['user_type'] = "user" ;

                header("Location: MemberPage.php");
            }
        } else {
            echo "Benutzer wurde nicht gefunden";
            header("Location: LogIn.html");
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

        $stmt = $conn->prepare("SELECT userType FROM UserAccounts WHERE UserLogin = ?");
        $stmt->bind_param("s", $userLogin);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        $hashArray = $result->fetch_all();
        return $hashArray[0][0];



        echo "error";
        return "";
    }

    /*
    function getUserID($userLogin)
    {

        if ($this->userIsValid()) {

            //create connection to db
            require_once("DBController.php");
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
    */
}