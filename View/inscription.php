<?php
require_once '../config.php';
require_once '../vendor/autoload.php';

use App\Controllers\UserController;

if (isset($_POST['submit'])) {
    $registration = new UserController;
    $registration->newUser($_POST['login'], $_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['confPassword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Registration</title>
</head>

<body>
    <div class="login-form">
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert alert-success">
                        <strong>Succès</strong> Inscription réussie !
                    </div>
                <?php
                    break;

                case 'password':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Les mots de passe ne correspondent pas
                    </div>
                <?php
                    break;

                case 'email':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Email non valide
                    </div>
                <?php
                    break;

                case 'firstnamelength':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Le prénom ne peut excéder 25 caractères
                    </div>
                <?php
                    break;

                case 'lastnamelength':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Le nom ne peut excéder 25 caractères
                    </div>
                <?php
                    break;

                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Compte déjà existant
                    </div>
        <?php

            }
        }
        ?>

        <form id="register" action="" method="post">
            <h2 class="text-center">Inscription</h2>
            <div class="form-group">
                <label for="login" id="login"></label>
                <input type="text" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="firstname" id="firstname"></label>
                <input type="text" name="firstname" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="lastname" id="lastname"></label>
                <input type="text" name="lastname" class="form-control" placeholder="Nom" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" id="password"></label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="confPassword" id="confPassword"></label>
                <input type="password" name="confPassword" class="form-control" placeholder="Confirmation de mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
        </form>
        <p id="generalconnexion" class="text-center"><a href="connexion.php">Sign In</a></p>
    </div>
</body>

</html>