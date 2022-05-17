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

    $stmt = $conn->prepare("INSERT INTO UserAccounts (`UserLogin`, `phoneNumber`, `UserPassword`, `userType`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $login, $number, $hashedPW,'user');


    //insert new User in database
    if ($stmt->execute() === TRUE) {
        header("Location: LogIn.html");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    //close connection
    $stmt->close();
    $conn->close();
} else {
    header("Location: SignUpForm.html");
}
