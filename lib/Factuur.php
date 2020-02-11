<?php
class Factuur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function makeInvoice($data)
    {
        $this->db->query(
            "INSERT INTO facturen ()
            VALUES ()"
        );

        //bind data
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
}