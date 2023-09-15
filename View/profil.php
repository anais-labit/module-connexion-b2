<?php
require_once '../config.php';
require_once '../vendor/autoload.php';
session_start();

use App\Controllers\UserController;
use App\Models\UserModel;


// if (isset($_POST['submit'])) {
//     $update = new UserController();
//     $update->updateField($_SESSION['login']);
//     // var_dump($update->updateField($_SESSION['login']));
//     // var_dump($update);
//     // die();
// }

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./javascript/login.js"></script>
    <title>Profil</title>
</head>

<header class="gl-header"> <?php include './includes/header.php' ?></header>

<body>
    <div class="page">
        <div class="container mt-5">
            <h1>Gestion du Profil</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="newLogin" placeholder="<?= $_SESSION['user']->getLogin()?>" readonly>

                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="newFirstname" name="newFirstname" placeholder="<?= $_SESSION['user']->getFirstname() ?>">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom de famille</label>
                    <input type="text" class="form-control" id="newLastname" name="newLastname" placeholder="<?= $_SESSION['user']->getLastname() ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirmation nouveau mot de passe</label>
                    <input type="password" class="form-control" id="confNewPassword" placeholder="Confirmation nouveau mot de passe">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Modifier le Profil</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Supprimer le Compte</button>
            </form>
        </div>

        <!-- Modal de confirmation de suppression de compte -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Confirmation de la suppression du compte</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inclure la bibliothèque Bootstrap JavaScript (optionnel) -->
    </div>
    <footer class="bg-dark text-light text-center py-3">
        <?php include './includes/footer.php'; ?></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>

</html>