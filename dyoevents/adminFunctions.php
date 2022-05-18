<?php
require_once("DBController.php");
class adminFunctions{
    function createEvent($eventName,$eventDate,$eventDescription,$ticketPrice){
        $db_handle = new DBController();


        $conn = $db_handle->connectDB();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Events (EventName, EventDescription, EventDate) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $eventName, $eventDescription, $eventDate);

        if ($stmt->execute() === TRUE) {
            echo "event created successfully";
            $stmt->close();
            $conn->close();
            $this->createTicket($eventName,$ticketPrice,$eventDate);
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }
    }
    function createTicket($name,$price,$date){
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Events (ProductImage, ProductName, ProductPrice, ProductDescription) VALUES ('../Pictures/D-Logo.png',?, ?, ?)");
        $stmt->bind_param("sss", $name, $price, $date);

        if($stmt->execute() === TRUE) {
            echo "ticket created successfully";
            $stmt->close();
            $conn->close();
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }
    }
    function createNewAdmin($username){
        $db_handle = new DBController();
        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE `UserAccounts` SET `userType` = 'admin' WHERE `UserAccounts`.`UserLogin` = ?");
        $stmt->bind_param("s", $username);

        if($stmt->execute() === TRUE) {
            echo "admin created successfully";
            $stmt->close();
            $conn->close();
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }


    }
    function deleteEvent($eventName){
        $db_handle = new DBController();
        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("DELETE FROM `Events` WHERE `Events`.`EventName` = ?");
        $stmt->bind_param("s", $eventName);

        if($stmt->execute() === TRUE) {
            echo "event deleted successfully";
            $stmt->close();
            $conn->close();
            $this->deleteTicket($eventName);
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }

    }
    function deleteTicket($name){
        $db_handle = new DBController();

        $conn = $db_handle->connectDB();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("DELETE FROM `Articles` WHERE `Articles`.`ProductName` = ?");
        $stmt->bind_param("sss", $name);

        if($stmt->execute() === TRUE) {
            echo "ticket deleted successfully";
            $stmt->close();
            $conn->close();
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }
    }
    function deleteUser($username){
        $db_handle = new DBController();
        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("DELETE FROM `UserAccounts` WHERE `UserAccounts`.`UserLogin` = ?");
        $stmt->bind_param("s", $username);

        if($stmt->execute() === TRUE) {
            echo "user deleted successfully";
            $stmt->close();
            $conn->close();
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }


    }
    function deletePicture($pictureName){
        $db_handle = new DBController();
        $conn = $db_handle->connectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("DELETE FROM `Pictures` WHERE `Pictures`.`PictureName` = ?");
        $stmt->bind_param("s", $pictureName);

        if($stmt->execute() === TRUE) {
            echo "picture deleted successfully";
            $stmt->close();
            $conn->close();
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
            $stmt->close();
            $conn->close();
        }
    }
}