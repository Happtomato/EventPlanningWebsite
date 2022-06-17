<?php

session_start();
$login = $_SESSION['login'];
$number = $_SESSION['number'];
$password = $_SESSION['password'];
$confirmedPW = $_SESSION['confirmPassword'];
$code = $_POST['code'];
$createdCode = $_SESSION['verificationCode'];

session_destroy();


if (!strcmp($password,$confirmedPW)) {
    if(!strcmp($code,$createdCode)) {

        require_once("DBController.php");
        $db_handle = new DBController();


        $conn = $db_handle->connectDB();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //hash pw
        $hashedPW = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $conn->prepare("INSERT INTO UserAccounts (UserLogin, phoneNumber, UserPassword,userType) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param("sss", $login, $number, $hashedPW);

        if ($stmt->execute() === TRUE) {
            $stmt->close();
            $conn->close();
            header("Location: LogIn.html");
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
            header("Location: signUpForm.html");
        }
    }
    //if verification code is wrong
    else{
        echo "verification failed";
        header("Location: signUpForm.html");
    }
    //if password is not correct
} else {
    echo "passwords do not match";
    header("Location: signUpForm.html");
}
