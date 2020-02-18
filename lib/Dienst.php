<?php

class Dienst
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showAllDiensten()
    {
        $this->db->query("SELECT * FROM diensten");

        $results = $this->db->resultSet();
        return $results;
    }
}