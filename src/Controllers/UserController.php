<?php

namespace App\Controllers;

require_once '../config.php';

use App\Models\UserModel;

class UserController
{
    function loginExists($login): bool
    {
        $loginValidation = new UserModel();

        $loginValidation->checkIfLoginExists($login);

        return ($loginValidation->getRow() !== 0);
    }

    function passwordValidation($password): bool
    {
        return (strlen($password) >= 8) &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[0-9]/', $password) &&
            preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password);
    }

    function newUser(
        string $login,
        string $firstname,
        string $lastname,
        string $password,
        string $confPassword,
    ): ?string {
        if (isset($login) && isset($firstname) && isset($lastname) && isset($password) && isset($confPassword) && (!$this->loginExists($login))) {
            $login = trim(htmlspecialchars($_POST['login']));
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $lastname = trim(htmlspecialchars($_POST['lastname']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confPassword = trim(htmlspecialchars($_POST['confPassword']));
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if (($password === $confPassword) && ($this->passwordValidation($password))) {
                $message = '';

                $newUser = new UserModel();

                $newUser->setLogin($login)
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setPassword($hashedPassword);

                $newUser->register($login, $firstname, $lastname, $hashedPassword);
                $message = 'Inscription réussie';
                return $message;
            }
        } else {
            header('Location: inscription.php');
        };
    }


    function checkIfUserExists(string $login, string $password): string
    {
        $message = '';
        $userValidation = new UserModel();

        $hashedPassword = $userValidation->getUserPassword($login);

        if ($this->loginExists($login) && password_verify($password, $hashedPassword)) {
            session_start();
            $message = 'Connexion réussie';
            return $message;
        } else {
            $message = 'Informations incorrectes';
            return $message;
        }
    }
}
