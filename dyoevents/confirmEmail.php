<?php
require_once ("ValidateUser.php");

$validation = new ValidateUser();

$login = $_POST["login"];
$number = $_POST["number"];
$password = $_POST["password"];
$confirmedPW = $_POST["confirmPassword"];
$code = $validation->sendMailToUser($login);

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
        <input type="hidden" name="createdCode" value="<?php $code?>'" />
        <input type="hidden" name="login" value="<?php $login?>'" />
        <input type="hidden" name="number" value="<?php $number?>'" />
        <input type="hidden" name="password" value="<?php $password?>'" />
        <input type="hidden" name="confirmPassword" value="<?php $confirmedPW?>'" />

        <button type="submit">Registrieren</button>
    </form>
</body>
</html>
