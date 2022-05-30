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
    function sendMailToUser($email){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $subject = "Email verification";

        $message = "Please Confirm your Email with the Following Code:" . $randomString;

        $headers = 'From: dyoevents.info@gmail.com';
        mail($email,$subject,$message,$headers);

        return $randomString;
    }
}