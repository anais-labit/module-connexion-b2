<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Faux Site</a>
        <div style="display: block; text-align:right">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= isset($_SESSION['login']) ? './profil.php' : './connexion.php' ?>">
                        <?= isset($_SESSION['login']) ? 'Profil' : 'Connexion' ?>
                    </a>
                </li>
                <li id="logOut" class="nav-item">
                    <?php if (isset($_SESSION['login'])) : ?>
                        <a class="nav-link" href="index.php?logOut">Déconnexion</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>