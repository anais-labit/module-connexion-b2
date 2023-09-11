<?php
require_once '../config.php';
require_once '../vendor/autoload.php';

use App\Controllers\UserController;

if (isset($_POST['submit'])) {
    $registration = new UserController;
    $registration->registration($_POST['login'], $_POST['firstname'], $_POST['lastname'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form id="register" action="" method="post">
        <p>
        <h1>Registration</h1>
        </p>
        <label for="login" id="login"></label>
        <input type="text" name="login" id="login" value="Login" required>
        <label for="firstname" id="firstname"></label>
        <input type="text" id="firstname" name="firstname" value="Firstname" required>
        <label for="lastname" id="lastname"></label>
        <input type="text" id="lastname" name="lastname" value="Lastname" required>
        <label for="password" id="password">Password : </label>
        <input type="password" id="password" name="password" required>
        <label for="confPassword" id="confPassword">Confirm Password :</label>
        <input type="password" id="confPassword" name="confPassword" required>
        <button type="submit" name="submit" id="submit">Register</button>
    </form>
</body>

</html>