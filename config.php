<?php

function connectDb(): PDO
{
    $dsn = 'mysql:host=localhost;dbname=moduleconnexionb2;charset=utf8';
    $password = (PHP_OS == 'Linux') ? '' : 'root';
    $user = 'root';

    try {
        $connexion = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        echo "Erreur de connexion à la base de données : " . $errorMessage;
        exit();
    }
    return $connexion;
}
