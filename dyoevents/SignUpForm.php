<?php

$login = $_POST["login"];
$number = $_POST["number"];
$password = $_POST["password"];
$confirmedPW = $_POST["confirmPassword"];


if (!strcmp($password,$confirmedPW)) {

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

    //insert new User in database
    /*
    $sql = "INSERT INTO UserAccounts(`UserLogin`, `phoneNumber`, `UserPassword`, `userType`) VALUES
                    ('$login','$number','$hashedPW','user' )";
    */

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
} else {
    header("Location: signUpForm.html");
}
