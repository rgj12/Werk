<?php
require 'helpers/fpdf.php';
require_once 'config/init.php';
$id = $_GET['id'];
$db =  new PDO('mysql:host=localhost;dbname=it-dashboard', 'root', '');

class myPDF extends FPDF
{


    function header()
    {
        $this->Image('templates/img/logo.png', 10, 6, 80);
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276, 10, 'Afspraak', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(276, 10, 'Afspraakbevestiging', 0, 0, 'C');
        $this->Ln(20);
    }


    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);
        $this->Cell(60, 10, 'Naam', 1, 0, 'C');
        $this->Cell(80, 10, 'Achternaam', 1, 0, 'C');
        $this->Cell(36, 10, 'Datum', 1, 0, 'C');
        $this->Cell(30, 10, 'Tijd', 1, 0, 'C');
        $this->Cell(60, 10, 'Omschrijving', 1, 0, 'C');

        $this->Ln();
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function viewTable($db, $id)
    {
        $stmt = $db->query("SELECT afspraken.id, afspraken.klant_id, afspraken.datum, afspraken.tijd,afspraken.omschrijving,afspraken.afspraak_voltooid,
        klanten.voornaam,klanten.achternaam 
        FROM afspraken 
        INNER JOIN klanten 
        ON afspraken.klant_id = klanten.id 
        WHERE klant_id = $id");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

            $this->Cell(60, 10, $data->voornaam, 1, 0, 'C');
            $this->Cell(80, 10, $data->achternaam, 1, 0, 'C');
            $this->Cell(36, 10, date_format(new dateTime($data->datum), "d/m/Y"), 1, 0, 'C');
            $this->Cell(30, 10, date_format(new dateTime($data->tijd), 'H:i'), 1, 0, 'C');
            $this->Cell(60, 10, $data->omschrijving, 1, 0, 'C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF;
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($db, $id);
$pdf->Output();