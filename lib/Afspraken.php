<?php
class Afspraken
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllAppointments()
    {
        $this->db->query("SELECT afspraken.id, afspraken.klant_id, afspraken.datum, afspraken.tijd,afspraken.omschrijving,afspraken.afspraak_voltooid,
         klanten.voornaam,klanten.achternaam 
         FROM afspraken 
         INNER JOIN klanten 
         ON afspraken.klant_id = klanten.id 
         WHERE afspraak_voltooid = false");

        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteAppointment($id)
    {
        $this->db->query('DELETE FROM afspraken WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function completeAppointment($id)
    {
        $this->db->query("UPDATE afspraken SET afspraak_voltooid = true WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}