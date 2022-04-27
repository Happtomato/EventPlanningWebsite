<?php

function createUser($userLogin,$number,$userPassword)
{
    echo "in create user func";
    //create connection to db
    require_once("dbcontroller.php");
    $db_handle = new DBController();

    $conn = $db_handle->connectDB();

   if ($conn->connect_error) {
       echo
        die("Connection failed: " . $conn->connect_error);
    }

   //hash pw
    $hashedPW = password_hash($userPassword, PASSWORD_DEFAULT);

   //insert new User in database
    $sql = "INSERT INTO UserAccounts(UserLogin,phoneNumber,UserPassword)
    VALUES ('$userLogin','$number','$hashedPW')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        Header("../index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //close connection
    $conn->close();
}
