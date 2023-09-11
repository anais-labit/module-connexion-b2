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
    <title>Connexion</title>
</head>

<body>

    <form action="index.php" method="post">
        <p>
        <h1>Connexion</h1>
        </p>
        <label for="login" id="login"></label>
        <input type="text" name="login" id="login" value="Login" required>
        <label for="password" id="password"></label>
        <input type="password" id="password" name="password" required>
        <button type="submit" id="submit">Submit</button>
    </form>


</body>

</html>