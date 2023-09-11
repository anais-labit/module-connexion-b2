<?php

namespace App\Models;

require_once '../config.php';

class UserModel
{

    private ?int $id;
    private ?string $login;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $password;

    public function __construct($id = null, $login = null, $firstname = null, $lastname = null, $password = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getLogin(): string
    {
        return $this->login;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    // public function setConfPassword($confPassword)
    // {
    //     $this->confPassword = $confPassword;
    // }
    // public function getConfPassword(): string
    // {
    //     return $this->confPassword;
    // }

    public function register(
        string $login,
        string $firstname,
        string $lastname,
        string $password,
        string $confPassword,
    ) {
        $request = "INSERT INTO user (login, firstname, lastname, password) VALUES (:login, :firstname, :lastname, :password)";
        $newUser = connectDb()->prepare($request);
        $newUser->bindParam(':login', $login);
        $newUser->bindParam(':firstname', $firstname);
        $newUser->bindParam(':lastname', $lastname);
        $newUser->bindParam(':password', $password);
        $newUser->execute();
    }

    public function checkIfExist(string $login)
    {
        $check = connectDb()->prepare('SELECT * FROM users WHERE email = :email');
        $check->execute(['login' => $login]);
        $data = $check->fetch();
        $row = $check->rowCount();
        if ($row === 1) {
            return true;
        } else return false;
        die();
    }
}
