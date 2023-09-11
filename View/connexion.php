<?php
require_once '../config.php';
require_once '../vendor/autoload.php';
connectDb();
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
        <?php
        if (isset($_GET['login_err'])) {
            $err = trim(htmlspecialchars($_GET['login_err']));
        ?>
            <div class="alert alert-danger"><strong>Erreur</strong> Informations incorrectes</div>
        <?php
        }
        ?>

        <form action="index.php" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
                <label for="login" id="login"></label>
                <input type="text" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" id="password"></label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
        </form>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>
    </div>


</body>

</html>

