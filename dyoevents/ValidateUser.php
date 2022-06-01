<?php


require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require ("PHPMailer-master/src/Exception.php");

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

    /**
     * @throws \Exception
     */
    function sendMailToUser(string $email): string
    {
        $randomString = md5(uniqid('', true));
        $subject = 'Please activate your account';
        $message = <<<MSG
        Hi,
        please click the following link to activate your account:
        {$randomString}
        MSG;



        $headers = [
            'From' => 'From: dyoevents.info@gmail.com',
            'MIME-Version' => 'MIME-Version: 1.0',
            'Content-type' => 'Content-Type: text/html; charset=UTF-8'
        ];

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPDebug  = 2;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = 'dyoevents.info@gmail.com'; // SMTP username
        $mail->Password = 'Dyoevents123'; // SMTP password
        $mail->setFrom('dyoevents.info@gmail.com', 'Dyoevents');
        $mail->addAddress($email );     // Add a recipient
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body    = $message;


        if(!$mail->Send()) {
            error_log("Mailer Error: " . $mail->ErrorInfo);

            echo '[br /]Fail';
        } else {
            error_log("Message sent!");
            echo '[br /]Pass';
        }

        return $randomString;
    }

}