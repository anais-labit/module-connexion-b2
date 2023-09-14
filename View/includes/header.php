<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Faux Site</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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