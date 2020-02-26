<?php

class Register
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function registerUser($data)
    {
        $this->db->query("SELECT * FROM users WHERE username = '" . $_POST['username'] . "'");
        if ($this->db->rowcount() > 0) {
            return false;
        }else{
            $this->db->query(
                "INSERT INTO users (username, password, profiel_foto)
            VALUES (:username, :password, :profiel_foto)"
            );

            //bind data
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':profiel_foto', $data['profiel_foto']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
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