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
    private ?int $row;

    public function __construct($id = null, $login = null, $firstname = null, $lastname = null, $password = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
    }

    public function setId(?int $id): UserModel
    {
        $this->id = $id;
        return $this;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setLogin(?string $login): UserModel
    {
        $this->login = $login;
        return $this;
    }
    public function getLogin(): string
    {
        return $this->login;
    }

    public function setFirstname(?string $firstname): UserModel
    {
        $this->firstname = $firstname;
        return $this;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setLastname(?string $lastname): UserModel
    {
        $this->lastname = $lastname;
        return $this;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setPassword(?string $password): UserModel
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRow(): ?int
    {
        return $this->row;
    }

    public function register(
        string $login,
        string $firstname,
        string $lastname,
        string $password,
    ): void {
        $request = "INSERT INTO user (login, firstname, lastname, password) VALUES (:login, :firstname, :lastname, :password)";
        $newUser = connectDb()->prepare($request);
        $newUser->bindValue(':login', $login);
        $newUser->bindValue(':firstname', $firstname);
        $newUser->bindValue(':lastname', $lastname);
        $newUser->bindValue(':password', $password);
        $newUser->execute();
    }

    public function checkIfLoginExists(string $login): void
    {
        $check = connectDb()->prepare('SELECT * FROM user WHERE login = :login');
        $check->bindValue(':login', $login);
        $check->execute();
        $this->row = $check->rowCount();

        var_dump($this->row = $check->rowCount());
    }

    public function getUserPassword(string $login)
    {
        $getUserPassword = connectDb()->prepare('SELECT password FROM user WHERE login = :login');
        $getUserPassword->bindValue(':login', $login);
        $getUserPassword->execute();
        $userPassword = $getUserPassword->fetch();

        if (empty($userPassword)) {
            return null;
        } else return $userPassword['password'];
    }
}
