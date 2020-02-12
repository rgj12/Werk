<?php
require 'helpers/fpdf.php';
require_once 'config/init.php';
$db =  new PDO('mysql:host=localhost;dbname=it-dashboard', 'root', '');

//init PDF lib
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);

//Logo
$pdf->Image('templates/img/logo.png', 10, 6, 80);
$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(59, 5, 'Factuur', 0, 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
//Bedrijf info & factuur info
$pdf->Cell(130, 5, 'It-Skills Nederland', 0, 0);
$pdf->Cell(34, 5, 'Factuurnummer : ', 0, 0);
$pdf->Cell(34, 5, '', 0, 1);
$pdf->Cell(130, 5, 'Julianastraat 41B', 0, 0);
$pdf->Cell(34, 5, 'Klantnummer : ', 0, 0);
$pdf->Cell(34, 5, '', 0, 1);
$pdf->Cell(130, 5, '3161AJ', 0, 0);
$pdf->Cell(34, 5, 'Datum : ', 0, 0);
$pdf->Cell(34, 5, '', 0, 1);
$pdf->Cell(59, 5, 'Tel: 010 501 32 22', 0, 1);
$pdf->Cell(59, 5, 'www.it-skills.nl', 0, 1);
$pdf->Cell(59, 5, 'www.mac4office.nl (Zakelijk)', 0, 1);

$pdf->Cell(189, 10, '', 0, 1);
//klant info
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 5, 'Klant gegevens : ', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 5, 'klant naam', 0, 1);
$pdf->Cell(100, 5, 'klant adres', 0, 1);
$pdf->Cell(100, 5, 'klant land', 0, 1);


$pdf->Output();