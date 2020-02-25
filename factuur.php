<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$userChatInfo = new Chat;
$facturen = new Factuur;
$producten = new Product;
$diensten = new Dienst;

if (isset($_POST['fk_id'])) {
    $id = $_POST['fk_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
}

if (isset($_GET['overzicht'])) {
    $template = new Template('templates/factuuroverzicht-template.php');
    $template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
    $template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
    $template->producten = $producten->showAllProducts();
    $template->diensten = $diensten->showAllDiensten();
    $template->facturen = $facturen->getAllInvoices();
    echo $template;
}

if (isset($_GET['bekijkid'])) {
    $factuur_id = $_GET['bekijkid'];
    $template = new Template('templates/factuur-template.php');
    $template->factuurInfo = $facturen->getCustomerInvoice($factuur_id);
    echo $template;
}