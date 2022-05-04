<?php
require_once ("DBController.php");
$db_handle = new dbcontroller();
$aResult = 0;

if( !isset($_POST['functionname']) ) {
    $aResult['error'] = 'No function name!';
}

if( !isset($_POST['arguments']) ) {
    $aResult['error'] = 'No function arguments!';
}

$file = $_POST['arguments'];

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'upload':
            if((count($_POST['arguments']) < 1) ) {

                //error in request
                $aResult = "error in request";

            }
            else {
                //save file to folder
                $uploadDirectory = "../Pictures/";
                $fileName = "$_FILES[$file]['name']";

                $filePath = $uploadDirectory.$fileName;

                echo $uploadDirectory;
                echo $fileName;
                echo $filePath;

                $conn = $db_handle->connectDB();


                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                //insert file to
                $sql = "INSERT INTO Pictures(`PictureName`, `PictureURL`) VALUES
                    ('$fileName','$filePath')";


                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                //close connection
                $conn->close();

                header("Location: pictures.php");
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
            break;
    }

}
