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
        $date = date('Y/m/d');
        $this->db->query("SELECT COUNT(id) AS aantalAfspraken FROM afspraken WHERE afspraak_voltooid = 0 AND datum = '$date'");

        $aantalAfspraken = $this->db->single();
        return $aantalAfspraken['aantalAfspraken'];
    }
    public function getAppointmentsComplete()
    {
        $date = date('Y/m/d');
        $this->db->query("SELECT COUNT(id) AS aantalAfsprakenVoltooid FROM afspraken WHERE afspraak_voltooid = 1 AND datum = '$date'");

        $aantalAfspraken = $this->db->single();
        return $aantalAfspraken['aantalAfsprakenVoltooid'];
    }


    public function getYearlyEarnings()
    {
        $date = date("Y");
        $this->db->query("SELECT SUM(totaalIncBtw) AS totaalJaar FROM facturen WHERE datum LIKE '%$date%'");

        $totaalJaar = $this->db->single();
        return $totaalJaar['totaalJaar'];
    }
    public function percentageComplete($complete, $notcomplete)
    {

        if ($notcomplete == 0 || $complete == 0) {
            return "100";
        } else {
            $percentage = round(($complete - $notcomplete) / $complete * 100, 2);
            return $percentage;
        }
    }
}