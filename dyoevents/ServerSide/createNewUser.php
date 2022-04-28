<?php

function createUser($userLogin,$number,$userPassword)
{
    //create connection to db
    require_once("DBController.php");
    $db_handle = new DBController();

    $conn = $db_handle->connectDB();

   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   //hash pw
    $hashedPW = password_hash($userPassword, PASSWORD_DEFAULT);

   //insert new User in database
    $sql = "INSERT INTO UserAccounts(`UserLogin`, `phoneNumber`, `UserPassword`, `userType`) VALUES ('$userLogin','$number','$hashedPW','user' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //close connection
    $conn->close();
}
