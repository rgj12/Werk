<?php
class Login
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function userInfo($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :user AND password = :pwd');

        $this->db->bind(':user', $username);
        $this->db->bind(':pwd', $password);

        $results = $this->db->resultSet();
        return $results;
    }

    public function checkCredentials($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :user AND password = :pwd');

        $this->db->bind(':user', $username);
        $this->db->bind(':pwd', $password);

        $request = $this->db->single();
        if ($request == true) {
            return true;
        } else {
            return false;
        }
    }
}