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
        $this->db->query("SELECT *
         FROM afspraken
         INNER JOIN klanten
         ON afspraken.klant_id = klanten.klantnummer
         WHERE afspraak_voltooid = false");

        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteAppointment($id)
    {
        $this->db->query('DELETE FROM afspraken WHERE afspraak_id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function completeAppointment($id)
    {
        $this->db->query("UPDATE afspraken SET afspraak_voltooid = true WHERE afspraak_id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editAppointment($data)
    {
        $this->db->query('UPDATE afspraken SET datum = :datum, tijd = :tijd, omschrijving = :omschrijving  WHERE afspraak_id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':datum', $data['datum']);
        $this->db->bind(':tijd', $data['tijd']);
        $this->db->bind(':omschrijving', $data['omschrijving']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAppointmentInfo($id)
    {
        $this->db->query("SELECT * FROM afspraken WHERE afspraak_id = :id");
        $this->db->bind(':id', $id);

        $info = $this->db->single();
        return $info;
    }
}