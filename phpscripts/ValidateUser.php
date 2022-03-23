<?php

class ValidateUser{

    require __DIR__ . '/dbcontroller.php'
function checkPassword(){

    $adminLogin = $_POST['adminLogin'];
    $adminPassword = $_POST['adminPassword'];

    $sql = "SELECT AdminPW FROM AdminLogins WHERE AdminLogin $adminLogin";
    $result = runStatementReturn($sql);

    $conn->close();

    if ($adminPassword === $result) {
        return true;
    } else {
        return false;
    }

}
}