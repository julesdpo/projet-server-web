<?php

require_once 'CoreModel.php';

class UserModel extends CoreModel
{
    protected $table = 'users';

    // Ajouter un nouvel utilisateur
    public function registerUser($username, $email, $hashedPassword)
    {
        $sql = "INSERT INTO $this->table (username, email, password) VALUES (:username, :email, :password)";
        return $this->query($sql, [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
        ]);
    }

    // Trouver un utilisateur par e-mail
    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        return $this->query($sql, ['email' => $email])->fetch();
    }
}
