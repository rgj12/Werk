<?php
class Klant
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getAllCustomers()
    {
        $this->db->query("SELECT * FROM klanten ORDER BY voornaam DESC");

        $results = $this->db->resultSet();
        return $results;
    }

    public function addCustomer($data)
    {
        $this->db->query(
            "INSERT INTO klanten (voornaam,achternaam,email,straatnaam,postcode,woonplaats,telefoonnummer,reden_bezoek)
            VALUES (:vnaam,:anaam,:mail,:stnaam,:pcode,:wplaats,:tel,:reden)"
        );

        //bind data
        $this->db->bind(':vnaam', $data['vnaam']);
        $this->db->bind(':anaam', $data['anaam']);
        $this->db->bind(':mail', $data['mail']);
        $this->db->bind(':stnaam', $data['stnaam']);
        $this->db->bind(':pcode', $data['pcode']);
        $this->db->bind(':wplaats', $data['wplaats']);
        $this->db->bind(':tel', $data['tel']);
        $this->db->bind(':reden', $data['reden']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCustomer($id)
    {
        $this->db->query('DELETE FROM klanten WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCustomerInfo($id)
    {
        $this->db->query("SELECT * FROM klanten WHERE id = :id");
        $this->db->bind(':id', $id);

        $info = $this->db->single();
        return $info;
    }

    public function editCustomer($data)
    {
        $this->db->query('UPDATE klanten SET voornaam = :vnaam,achternaam = :anaam,email = :mail,straatnaam = :stnaam,postcode = :pcode,woonplaats = :wplaats,telefoonnummer = :tel WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':vnaam', $data['vnaam']);
        $this->db->bind(':anaam', $data['anaam']);
        $this->db->bind(':mail', $data['mail']);
        $this->db->bind(':stnaam', $data['stnaam']);
        $this->db->bind(':pcode', $data['pcode']);
        $this->db->bind(':wplaats', $data['wplaats']);
        $this->db->bind(':tel', $data['tel']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function makeAppointment($data)
    {
        $this->db->query(
            "INSERT INTO afspraken (klant_id,datum,tijd,omschrijving)
            VALUES (:k_id,:datum,:tijd,:omsc)"
        );

        //bind data
        $this->db->bind(':k_id', $data['id']);
        $this->db->bind(':datum', $data['datum']);
        $this->db->bind(':tijd', $data['tijd']);
        $this->db->bind(':omsc', $data['omschr']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAppointments($id)
    {
        $this->db->query("SELECT * FROM afspraken WHERE klant_id = :id AND afspraak_voltooid = false ORDER BY datum DESC");
        $this->db->bind(':id', $id);

        $afspraken = $this->db->resultSet();
        return $afspraken;
    }
}