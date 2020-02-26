<?php

class Login
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function dehashPass($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = :user");
        $this->db->bind(":user", $username);

        $result = $this->db->resultSet();
        return $result;
    }
}