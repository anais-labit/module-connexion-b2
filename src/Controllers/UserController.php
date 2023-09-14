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
    ): void {
        if (isset($login) && isset($firstname) && isset($lastname) && isset($password) && isset($confPassword) && (!$this->loginExists($login))) {
            $login = trim(htmlspecialchars($_POST['login']));
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $lastname = trim(htmlspecialchars($_POST['lastname']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confPassword = trim(htmlspecialchars($_POST['confPassword']));
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if (($password === $confPassword) && ($this->passwordValidation($password))) {
                $newUser = new UserModel();

                $newUser->setLogin($login)
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setPassword($hashedPassword);

                $newUser->register($login, $firstname, $lastname, $hashedPassword);

                echo json_encode([
                    "success" => true,
                    "message" => "Inscription réussie. Vous allez être redirigé(e)."
                ]);
                $_SESSION['login'] = $_POST['login'];
            } else if ($this->loginExists($login) === true) {
                echo json_encode([
                    "success" => false,
                    "message" => "Ce login n'est pas disponible."
                ]);
            }
        } else {
            var_dump($this->loginExists($login));
            echo json_encode([
                "success" => false,
                "message" => "Une erreur s'est produite."
            ]);
        }
    }

    function logIn(string $login, string $password): void
    {
        $userValidation = new UserModel();

        $userInfos = $userValidation->getUserInfos($login);

        $hashedPassword = $userInfos['password'];

        if ($this->loginExists($login) && password_verify($password, $hashedPassword)) {
            echo json_encode([
                "success" => true,
                "message" => "Connexion réussie. Vous allez être redirigé(e)."
            ]);
            $_SESSION['login'] = $_POST['login'];
            $this->setSession($_POST['login']);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Informations incorrectes."
            ]);
        }
    }

    function setSession($login): void
    {
        $getUserInfos = new UserModel();
        $userInfos = $getUserInfos->getUserInfos($login);
        $_SESSION['firstname'] = $userInfos['firstname'];
        $_SESSION['lastname'] = $userInfos['lastname'];
    }


    function logOut(): void
    {
        unset($_SESSION);
        session_destroy();
        header('Location:index.php');
    }
}
