<?php

namespace App\Controllers;

require_once '../config.php';

use App\Models\UserModel;

class UserController
{
    private $user;

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
        $login = trim(htmlspecialchars($_POST['login']));
        $firstname = trim(htmlspecialchars($_POST['firstname']));
        $lastname = trim(htmlspecialchars($_POST['lastname']));
        $password = trim(htmlspecialchars($_POST['password']));
        $confPassword = trim(htmlspecialchars($_POST['confPassword']));
        if (empty($login) || empty($firstname) || empty($lastname) || empty($password) || empty($confPassword)) {
            echo json_encode([
                "success" => false,
                "message" => "Tous les champs doivent être remplis."
            ]);
            return;
        }
        if (isset($login) && isset($firstname) && isset($lastname) && isset($password) && isset($confPassword) && (!$this->loginExists($login))) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if (($password === $confPassword) && ($this->passwordValidation($password))) {
                $newUser = new UserModel();

                $newUser->setLogin($login)
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setPassword($hashedPassword);

                $this->user = $newUser;

                $this->setSession();

                $newUser->register($login, $firstname, $lastname, $hashedPassword);

                echo json_encode([
                    "success" => true,
                    "message" => "Inscription réussie. Vous allez être redirigé(e)."
                ]);
            } else if (!$this->passwordValidation($password)) {
                echo json_encode([
                    "success" => false,
                    "message" => "Le mot de passe doit contenir au minimum huit caractères, une majuscule, un chiffre et un caractère spécial."
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "Les mots de passe ne correspondent pas."
                ]);
            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Ce login n'est pas disponible."
            ]);
        }
    }

    function logIn(string $login, string $password): void
    {
        $userValidation = new UserModel();

        $userInfos = $userValidation->getUserInfos($login);

        $hashedPassword = $userInfos['password'];

        if (empty($login) || empty($password)) {
            echo json_encode([
                "success" => false,
                "message" => "Renseignez votre mot de passe."
            ]);
            return;
        }

        if ($this->loginExists($login) && password_verify($password, $hashedPassword)) {
            $_SESSION['login'] = $_POST['login'];
            echo json_encode([
                "success" => true,
                "message" => "Connexion réussie. Vous allez être redirigé(e)."
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Informations incorrectes."
            ]);
        }
    }

    function setSession(): void
    {
        $_SESSION['user'] = $this->user;
    }

    function logOut(): void
    {
        unset($_SESSION);
        session_destroy();
        header('Location:index.php');
    }

    function updateFields(string $login, array $values)
    {
        $userModel = new UserModel();

        if (isset($_POST['newFirstname']) && ($_POST['newFirstname'] !== $_SESSION['user']->getFirstname())) {
            $newFirstname = $_POST['newFirstname'];
            $valuesToSend[':firstname'] = htmlspecialchars(trim($newFirstname));
        }
        if (isset($_POST['newLastname']) && ($_POST['newLastname'] !== $_SESSION['user']->getLastname())) {
            $newLastname = $_POST['newLastname'];
            $valuesToSend[':lastname'] = htmlspecialchars(trim($newLastname));
        }
        if (($values['newPassword']) !== '' && ($values['confNewPassword']) !== '' && ((($values['newPassword']) === ($values['confNewPassword']))) && ($this->passwordValidation(($values['newPassword'])))) {
            $valuesToSend[':password'] = htmlspecialchars(trim(password_hash($values['newPassword'], PASSWORD_DEFAULT)));
        }
        // Vérification des champs obligatoires

        if (empty(trim($_POST['newFirstname'])) || empty(trim($_POST['newLastname'])) || empty(trim($_POST['newPassword']))) {
            $errors[] = 'Certains champs sont vides';
        }

        $errors = []; // initialisation du tableau d'erreurs
        // Le code à exécuter si aucune erreur n'a été trouvée
        if (empty($errors)) {
            // Ajout de l'id à envoyer à la base de données
            $valuesToSend[':login'] = $login;
            // Envoi des valeurs modifiées à la base de données
            $userModel->updateOne($valuesToSend);
            // mise à jour de la session
            $_SESSION['user']->setFirstname($_POST['newFirstname']);
            $_SESSION['user']->setLastname($_POST['newLastname']);
            $_SESSION['user']->setPassword($_POST['newPassword']);

            header('Content-Type: application/json');
            echo (json_encode(['success' => 'Les mises à jour ont bien été prises en compte.']));
            // Le code à exécuter si des erreurs ont été trouvées
        } else {
            header('Content-Type: application/json');
            echo (json_encode(['errors' => $errors]));
        }
    }
}
