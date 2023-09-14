<?php

use App\Controllers\UserController;
use App\Models\UserModel;

session_start();
require_once '../config.php';
require_once '../vendor/autoload.php';

if (isset($_GET['logOut'])) {
    $logOut = new UserController();
    $logOut->logOut();
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faux Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<header> <?php include './includes/header.php' ?></header>

<body>
    <div class="page">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <?php if (isset($_SESSION['login'])) { ?>
                        <h1>Bienvenue <?php echo ucwords($_SESSION['login']) ?></h1>
                        <p>Ceci est un exemple de page d'accueil pour un faux site créé avec Bootstrap.</p>
                        <a href="./profil.php" class="btn btn-primary">Gérer mon profil</a>
                    <?php } else { ?>
                        <h1>Bienvenue sur Faux Site</h1>
                        <p>Ceci est un exemple de page d'accueil pour un faux site créé avec Bootstrap.</p>
                        <a href="./inscription.php" class="btn btn-primary">Créer un compte</a>
                    <?php  } ?>

                </div>

                <div class="col-md-6">
                    <img src="https://via.placeholder.com/400" alt="Image de présentation" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-dark text-light text-center py-3">
        <?php include './includes/footer.php'; ?></footer>
</body>

</html>