<?php

use App\Models\UserModel;

$role = new UserModel();

// var_dump($_SESSION['user']->getRole());

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Faux Site</a>
        <div style="display: block; text-align:right">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if (
                            $_SESSION['user']->getRole()
                            === 1
                        ) : ?>
                            <a class="nav-link" href="./admin.php">Admin</a>
                        <?php else : ?>
                            <a class="nav-link" href="./profil.php">Profil</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a class="nav-link" href="./connexion.php">Connexion</a>
                    <?php endif; ?>
                </li>
                <li id="logOut" class="nav-item">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a class="nav-link" href="index.php?logOut">Déconnexion</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>