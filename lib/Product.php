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

    public function addProduct($data)
    {
        $this->db->query(
            "INSERT INTO producten (productnaam, prijs)
            VALUES (:pnaam, :pprijs)"
        );

        //bind data
        $this->db->bind(':pnaam', $data['pnaam']);
        $this->db->bind(':pprijs', $data['pprijs']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $this->db->query('DELETE FROM producten WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductInfo($id)
    {
        $this->db->query("SELECT * FROM producten WHERE id = :id");
        $this->db->bind(':id', $id);

        $info = $this->db->single();
        return $info;
    }

    public function editProduct($data)
    {
        $this->db->query('UPDATE producten SET productnaam = :pnaam, prijs = :pprijs WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pnaam', $data['pnaam']);
        $this->db->bind(':pprijs', $data['pprijs']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function aantalVerkocht($product)
    {

        $this->db->query("UPDATE producten SET aantal_verkocht =  aantal_verkocht +1 WHERE productnaam = '$product'");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function totaalVerkocht(){
        $this->db->query("SELECT SUM(aantal_verkocht) as totaalverkocht from producten");
        $totaalVerkocht= $this->db->single();
        return $totaalVerkocht['totaalverkocht'];
    }
}