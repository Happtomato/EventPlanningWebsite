<?php
require_once ("ValidateUser.php");

$validation = new ValidateUser();

$_SESSION['verificationCode'] = $validation->sendMailToUser($_POST["login"]);
$_SESSION['login'] = $_POST["login"];
$_SESSION['number'] = $_POST["number"];
$_SESSION['password'] = $_POST["password"];
$_SESSION['confirmPassword'] = $_POST["confirmPassword"];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
    <h1>Validate your Email adress</h1>
    <form class="modal-content animate" action="SignUpForm.php" method="post">
        <label for="code"><b>E-mail Adresse</b></label>
        <input type="text" placeholder="Verifizierungs Code" name="code" required>


        <button type="submit">Registrieren</button>
    </form>
</body>
</html>
