<?php
require_once '../config.php';
require_once '../vendor/autoload.php';
session_start();

use App\Controllers\UserController;

if (isset($_POST['updateProfile'])) {
    $update = new UserController();
    $reqUpdate = $update->updateFields($_SESSION['user']->getLogin(), $_POST);
    die();
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./javascript/update.js"></script>
    <title>Profil</title>
</head>

<header class="gl-header"> <?php include './includes/header.php' ?></header>

<body>
    <div class="page">
        <div class="container mt-5">
            <h1>Gestion du Profil</h1>
            <form action="profil.php" method="POST" id="updateForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="newLogin" placeholder="<?= ($_SESSION['user']->getLogin()) ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="newFirstname" name="newFirstname" value="<?= $_SESSION['user']->getFirstname() ?>">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom de famille</label>
                    <input type="text" class="form-control" id="newLastname" name="newLastname" value="<?= $_SESSION['user']->getLastname() ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirmation nouveau mot de passe</label>
                    <input type="password" class="form-control" id="confNewPassword" name="confNewPassword" placeholder="Confirmation nouveau mot de passe">
                </div>

                <button type="submit" name="submit" id="updateButton" class="btn btn-primary">Modifier le Profil</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Supprimer le Compte</button>
                <div id="msgContainer"></div>
            </form>
        </div>
    </div>
    <footer class="bg-dark text-light text-center py-3">
        <?php include './includes/footer.php'; ?></footer>

</body>

</html>