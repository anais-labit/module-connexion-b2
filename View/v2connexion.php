<?php
require_once '../config.php';
require_once '../vendor/autoload.php';

use App\Controllers\UserController;

if (isset($_POST['submit'])) {
    $connexion = new UserController;

    $message = $connexion->checkIfUserExists($_POST['login'], $_POST['password']);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Connexion</title>
</head>

<body>

    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Connexion</h2>
            <?php if (isset($_POST['submit'])) {
                echo $message;
            }
            ?>
            <div class="form-group">
                <label for="login" id="login"></label>
                <input type="text" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" id="password"></label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </form>
        <p class="text-center"><a href="inscription.php">Sign Up</a></p>
    </div>


</body>

</html>