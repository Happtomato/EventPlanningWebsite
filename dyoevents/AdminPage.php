<?php
require_once("DBController.php");

if (!empty($_POST["action"])) {
    switch ($_POST["action"]) {
        case "createEvent":

            $name = $_POST["EventName"];
            $date = $_POST["EventDate"];
            $description = $_POST["EventDesc"];
            $price = $_POST["Price"];

            createEvent($name, $date, $description, $price);

            break;
        case "createNewAdmin":
            $username = $_POST["UserName"];
            createNewAdmin($username);
            break;

        case 'deleteEvent':

            $name = $_POST['EventName'];
            deleteEvent($name);

            break;

        case 'deleteUser':

            $username = $_POST['UserName'];
            deleteUser($username);

            break;

        case 'deletePicture':

            $picturename = $_POST['PictureName'];
            deletePicture($picturename);

            break;
    }
}

function createEvent($eventName,$eventDate,$eventDescription,$ticketPrice){
                $db_handle = new DBController();

                $conn = $db_handle->connectDB();

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }



                $stmt = $conn->prepare("INSERT INTO Events (EventName, EventDescription, EventDate) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $eventName, $eventDescription, $eventDate);

                if ($stmt->execute() === TRUE) {

                    $stmt->close();
                    $conn->close();
                    createTicket($eventName,$ticketPrice,$eventDate);
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

                $stmt = $conn->prepare("INSERT INTO Articles (ProductImage, ProductName, ProductPrice, ProductDescription) VALUES ('/Pictures/D-Logo.png',?, ?, ?)");
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
                    $stmt->close();
                    $conn->close();
                    deleteTicket($eventName);
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
                $stmt->bind_param("s", $name);

                if($stmt->execute() === TRUE) {
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


session_start();
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin") {
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="Pictures/D-Logo.png" />
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Admin Panel</title>
</head>

<body>
    <header>
    <li><img id="nav-title" src="Pictures/logo.png" sizes="20px"></li>
        <!-- Nav Bar-->
        <ul class="nav-bar">
            <li><a href="AdminPage.php">Home</a></li>
            <li><a href="pictures.php">Bilder</a></li>
            <li><a href="shop.php">Tickets</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="profilePage.php">Profil</a></li>
            <li><a href="index.html">Ausloggen</a></li>
        </ul>
        <!-- Nav Bar-->
        <!-- Nav Bar Mobile-->
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="MemberPage.php">Home</a>
                <a href="pictures.php">Bilder</a>
                <a href="shop.php">Tickets</a>
                <a href="upload.php">Upload</a>
            </div>
        </div>


        <div class="dropdown">
            <button class="dropdown-btn"><i class="fa fa-user"></i></button>
            <div class="dropdown-content">
                <a href="profilePage.php">Profil</a>
                <a href="index.html">Ausloggen</a>
            </div>
        </div>

        <!-- Nav Bar Mobile-->
    </header>


    <!-- Form Create Event -->
    <h2>Create Event</h2>
    <form method="post" action="AdminPage.php">
        <div class="container">
            <input type="hidden" name="action" value="createEvent" />
            <input type="text" placeholder="Eventname" name="EventName" required>
            <input type="date" placeholder="EventDatum" name="EventDate" required>
            <input type="text" placeholder="EventDescription" name="EventDesc" required>
            <input type="text" placeholder="Eventpreis" name="Price" required>

            <button type="submit">Create</button>
    </form>

    <!-- Form Delete Event -->
    <h2>Delete Event</h2>
    <form method="post" action="AdminPage.php">
        <div class="container">
            <input type="hidden" name="action" value="deleteEvent" />
            <input type="text" placeholder="Eventname" name="EventName" required>

            <button type="submit">Delete</button>
    </form>

    <!-- Form Promote User -->
    <h2>Promote User</h2>
    <form method="post" action="AdminPage.php">
        <div class="container">
            <input type="hidden" name="action" value="createNewAdmin" />
            <input type="text" placeholder="Username" name="UserName" required>

            <button type="submit">Promote</button>
    </form>

    <!-- Form Delete User -->
    <h2>Delete User</h2>
    <form method="post" action="AdminPage.php">
        <div class="container">
            <input type="hidden" name="action" value="deleteUser" />
            <input type="text" placeholder="UserName" name="UserName" required>

            <button type="submit">Delete</button>
    </form>

    <!-- Form Delete Picture -->
    <h2>Delete Picture</h2>
    <form method="post" action="AdminPage.php">
        <div class="container">
            <input type="hidden" name="action" value="deletePicture" />
            <input type="text" placeholder="Picturename" name="PictureName" required>

            <button type="submit">delete</button>
    </form>

</body>

</html>

<?php
}
else{
    session_destroy();
    header("Location: LogIn.html");
}
?>