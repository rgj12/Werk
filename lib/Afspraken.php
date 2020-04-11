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
         FROM bookings
         WHERE afspraak_voltooid = false");

        $results = $this->db->resultSet();
        return $results;
    }
    public function getAllCompleteAppointments()
    {
        $this->db->query("SELECT *
         FROM bookings
         WHERE afspraak_voltooid = true");

        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteAppointment($id)
    {
        $this->db->query('DELETE FROM bookings WHERE afspraak_id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function completeAppointment($id, $datum)
    {
        $this->db->query("UPDATE bookings SET afspraak_voltooid = true,datum_afspr_voltooid = :datum WHERE afspraak_id = :id");
        $this->db->bind(':datum', $datum);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editAppointment($data)
    {
        $this->db->query('UPDATE bookings SET datum = :datum, tijd = :tijd, omschrijving = :omschrijving ,medewerker = :medewerker WHERE afspraak_id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':datum', $data['datum']);
        $this->db->bind(':tijd', $data['tijd']);
        $this->db->bind(':omschrijving', $data['omschrijving']);
        $this->db->bind(':medewerker', $data['medewerker']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAppointmentInfo($id)
    {
        $this->db->query("SELECT * FROM bookings WHERE afspraak_id = :id");
        $this->db->bind(':id', $id);

        $info = $this->db->single();
        return $info;
    }
    public function getMedewerkers()
    {
        $this->db->query("SELECT username FROM users");
        $info = $this->db->resultSet();
        return $info;
    }

    public function getTijden()
    {
        $this->db->query("SELECT * FROM beschikbare_tijden");
        $info = $this->db->resultSet();
        return $info;
    }

    public function checkIfTimeIsTaken($datum, $tijd)
    {
        $this->db->query("SELECT COUNT(tijd) AS result FROM bookings WHERE datum = :datum AND tijd = :tijd");
        $this->db->bind(":datum", $datum);
        $this->db->bind(":tijd", $tijd);

        $result = $this->db->single();

        return $result['result'];
    }
    //kri
}