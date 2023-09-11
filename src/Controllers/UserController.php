<?php

namespace App\Controllers;

require_once '../config.php';


use App\Models\UserModel;

class UserController
{
    function registration($login, $firstname, $lastname, $password)
    {
        if (isset($login) && isset($firstname) && isset($lastname) && isset($password)) {
            $login = trim(htmlspecialchars($_POST['login']));
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $lastname = trim(htmlspecialchars($_POST['lastname']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confPassword = trim(htmlspecialchars($_POST['confPassword']));

            $user = new UserModel();

            $user->setLogin($login);
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setPassword($password);

            var_dump($user);

            $user->register($login, $firstname, $lastname, $password);
        }
    }

}
