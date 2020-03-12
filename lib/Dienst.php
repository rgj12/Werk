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

    public function addDienst($data)
    {
        $this->db->query(
            "INSERT INTO diensten (dienstnaam, dienstprijs)
            VALUES (:dnaam, :dprijs)"
        );

        //bind data
        $this->db->bind(':dnaam', $data['dnaam']);
        $this->db->bind(':dprijs', $data['dprijs']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteDienst($id)
    {
        $this->db->query('DELETE FROM diensten WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDienstInfo($id)
    {
        $this->db->query("SELECT * FROM diensten WHERE id = :id");
        $this->db->bind(':id', $id);

        $info = $this->db->single();
        return $info;
    }

    public function editDienst($data)
    {
        $this->db->query('UPDATE diensten SET dienstnaam = :dnaam, dienstprijs = :dprijs WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':dnaam', $data['dnaam']);
        $this->db->bind(':dprijs', $data['dprijs']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function aantalVerkocht($dienst)
    {

        $this->db->query("UPDATE diensten SET aantal_verkocht =  aantal_verkocht +1 WHERE dienstnaam = '$dienst'");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function totaalVerkocht()
    {
        $this->db->query("SELECT SUM(aantal_verkocht) as totaalverkocht from diensten");
        $totaalVerkocht = $this->db->single();
        return $totaalVerkocht['totaalverkocht'];
    }

    public function showDienstenInGraph()
    {
        $this->db->query("SELECT * FROM diensten WHERE aantal_verkocht > 0");

        $results = $this->db->resultSet();
        return $results;
    }
}