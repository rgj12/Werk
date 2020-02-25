<?php
class Factuur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllInvoices()
    {
        $this->db->query("SELECT * FROM facturen ORDER BY factuurnummer DESC");

        $results = $this->db->resultSet();
        return $results;
    }

    public function makeInvoice($data)
    {

        //BTW verschil toevoegen
        $this->db->query(
            "INSERT INTO facturen (voornaam,achternaam,klantnummer,product1,product2,product3,dienst1,dienst2,dienst3,product_prijs1,product_prijs2,product_prijs3,dienst_prijs1,dienst_prijs2,dienst_prijs3,
            totaalIncBtw,totaalExBtw,totaalBTW,datum,betaalOpties)
            VALUES (:vnaam,:anaam,:knummer,:p1,:p2,:p3,:d1,:d2,:d3,:pp1,:pp2,:pp3,:dp1,:dp2,:dp3,:totaalInc,:totaalExBtw,:totaalBTW,:datum,:btoptie)"
        );
        // return $data['pp3'];

        //bind data
        $this->db->bind(':vnaam', $data['vnaam']);
        $this->db->bind(':anaam', $data['anaam']);
        $this->db->bind(':knummer', $data['k_id']);
        $this->db->bind(':p1', $data['pp1'][0]);
        $this->db->bind(':p2', $data['pp2'][0]);
        $this->db->bind(':p3', $data['pp3'][0]);
        $this->db->bind(':d1', $data['dp1'][0]);
        $this->db->bind(':d2', $data['dp2'][0]);
        $this->db->bind(':d3', $data['dp3'][0]);
        $this->db->bind(':pp1', $data['pp1'][1]);
        $this->db->bind(':pp2', $data['pp2'][1]);
        $this->db->bind(':pp3', $data['pp3'][1]);
        $this->db->bind(':dp1', $data['dp1'][1]);
        $this->db->bind(':dp2', $data['dp2'][1]);
        $this->db->bind(':dp3', $data['dp3'][1]);
        $this->db->bind(':totaalInc', $data['totaal']);
        $this->db->bind(':totaalExBtw', $data['totaalexBtw']);
        $this->db->bind(':totaalBTW', $data['totaalBTW']);
        $this->db->bind(':datum', $data['datum']);
        $this->db->bind(':btoptie', $data['btoptie']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCustomerInvoice($factuurnummer)
    {
        //query aanpassen naar een join met klanten tabel
        $this->db->query("SELECT * FROM facturen INNER JOIN klanten ON facturen.`klantnummer` = klanten.id WHERE factuurnummer = :id ");
        $this->db->bind(':id', $factuurnummer);
        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteFactuur($id)
    {
        $this->db->query("DELETE FROM facturen WHERE factuurnummer = :id");
        $this->db->bind(":id", $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editInvoice($data)
    {
        $this->db->query('UPDATE facturen SET voornaam = :vnaam, achternaam = :anaam, product1 = :p1,product2 = :p2 ,product3 = :p3, dienst1 = :d1, dienst2 = :d2, dienst3 = :d3,
        product_prijs1 = :pp1, product_prijs2 = :pp2, product_prijs3 = :pp3, dienst_prijs1 = :dp1, dienst_prijs2 = :dp2, dienst_prijs3 = :dp3, totaalIncBtw = :totaalInc, totaalExBtw = :totaalExBtw,
        totaalBTW = :totaalBTW, betaalOpties = :btoptie WHERE factuurnummer = :factnummmer');

        $this->db->bind(':vnaam', $data['vnaam']);
        $this->db->bind(':anaam', $data['anaam']);
        $this->db->bind(':factnummmer', $data['factnummer']);
        $this->db->bind(':p1', $data['pp1'][0]);
        $this->db->bind(':p2', $data['pp2'][0]);
        $this->db->bind(':p3', $data['pp3'][0]);
        $this->db->bind(':d1', $data['dp1'][0]);
        $this->db->bind(':d2', $data['dp2'][0]);
        $this->db->bind(':d3', $data['dp3'][0]);
        $this->db->bind(':pp1', $data['pp1'][1]);
        $this->db->bind(':pp2', $data['pp2'][1]);
        $this->db->bind(':pp3', $data['pp3'][1]);
        $this->db->bind(':dp1', $data['dp1'][1]);
        $this->db->bind(':dp2', $data['dp2'][1]);
        $this->db->bind(':dp3', $data['dp3'][1]);
        $this->db->bind(':totaalInc', $data['totaal']);
        $this->db->bind(':totaalExBtw', $data['totaalexBtw']);
        $this->db->bind(':totaalBTW', $data['totaalBTW']);
        $this->db->bind(':btoptie', $data['btoptie']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function VAT($data)
    {
        $btw = 21;
        $totaalprijsExBtw = ($data['totaal'] / (100 + $btw) * 100);

        return $totaalprijsExBtw;
    }
}