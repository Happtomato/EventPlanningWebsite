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

    //insert new User in database
    $sql = "INSERT INTO UserAccounts(`UserLogin`, `phoneNumber`, `UserPassword`, `userType`) VALUES
                    ('$login','$number','$hashedPW','user' )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //close connection
    $conn->close();
} else {
    echo "The Passwords do not match!";
    include_once('../ClientSide/signUpForm.html');

}
