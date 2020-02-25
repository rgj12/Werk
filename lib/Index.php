<?php
class Index
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDailyEarnings()
    {
        $date = date("Y/m/d");
        $this->db->query("SELECT SUM(totaalIncBtw) AS totaalDag FROM facturen WHERE datum = '$date'");

        $totaalDag = $this->db->single();
        return $totaalDag['totaalDag'];
    }

    public function getAppointmentsNotComplete()
    {
        $this->db->query("SELECT COUNT(id) AS aantalAfspraken FROM afspraken WHERE afspraak_voltooid = 0");

        $aantalAfspraken = $this->db->single();
        return $aantalAfspraken['aantalAfspraken'];
    }
    public function getAppointmentsComplete()
    {
        $this->db->query("SELECT COUNT(id) AS aantalAfsprakenVoltooid FROM afspraken WHERE afspraak_voltooid = 1");

        $aantalAfspraken = $this->db->single();
        return $aantalAfspraken['aantalAfsprakenVoltooid'];
    }
    public function percentageComplete($complete, $notcomplete)
    {

        if ($notcomplete == 0 || $complete == 0) {
            return "0";
        } else {
            $percentage = round($complete / $notcomplete  * 100, 2);
            return $percentage;
        }
    }
}