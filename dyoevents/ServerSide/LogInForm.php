<?php

require_once ("ValidateUser.php");

$validate = new ValidateUser();

$login = $_POST["login"];
$password = $_POST["password"];

$validate->userIsValid($login,$password);

