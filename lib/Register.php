<?php

class Register
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkUsername($username)
    {
        $this->db->query("SELECT COUNT(username) AS usernames FROM users WHERE username = :username");
        $this->db->bind(":username", $username);
        $rows = $this->db->single();
        return $rows['usernames'];

    }

    public function registerUser($data)
    {
        $this->db->query(
            "INSERT INTO users (username,email,password, profiel_foto)
            VALUES (:username,:email, :password, :profiel_foto)"
        );

        //bind data
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':profiel_foto', $data['profiel_foto']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function editUser($data)
    {
        $this->db->query('UPDATE users SET username = :username, password = :password WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}