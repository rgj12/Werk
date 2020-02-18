<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showAllProducts()
    {
        $this->db->query("SELECT * FROM producten");

        $results = $this->db->resultSet();
        return $results;
    }
}