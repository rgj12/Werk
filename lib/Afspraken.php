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
        $this->db->query("SELECT * FROM `afspraken` LEFT JOIN klanten on afspraken.klant_id = klanten.id WHERE afspraak_voltooid = false ORDER BY afspraken.id DESC");

        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteAppointment($id)
    {
        $this->db->query('DELETE FROM afspraken WHERE klant_id = :id');
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