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

    }

    function sendMailToUser(string $email): string
    {
        $randomString = md5(uniqid('', true));

        //set url for sending email api
        $url = "https://test-backend.flogintra.ch/dd_api_sendmail.asp";

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_POST,true);
        $subject = "Email verification";
        $content = "verify your email with the following code: " . $randomString;

        $headers = array(
            "X-DD-Key: 4471C30F-81F4-4487-A16D-20586BD569AE",
            "X-DD-MailReceiver: $email",
            "X-DD-MailSubject: $subject",
            "X-DD-MailContent: $content",
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_exec($curl);
        curl_close($curl);

        return $randomString;
    }


    function correctPassword($userLogin,$userPassword,$newPass){

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



        $hashArray = $result->fetch_all();
        $hash = $hashArray[0][0];


        $hashedPW = password_hash($newPass, PASSWORD_DEFAULT);

        if (password_verify($userPassword,$hash)) {
            $stmt = $conn->prepare("UPDATE `UserAccounts` SET `UserPassword` = ? WHERE `UserAccounts`.`UserLogin` = ?");
            $stmt->bind_param("ss", $hashedPW,$userLogin);
            return true;
        }
        return false;
    }

}