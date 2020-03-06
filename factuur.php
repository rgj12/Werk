<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$userChatInfo = new Chat;
$facturen = new Factuur;
$producten = new Product;
$diensten = new Dienst;
$userChatInfo = new Chat;

if (isset($_POST['fk_id'])) {
    $id = $_POST['fk_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
}

if (isset($_GET['overzicht'])) {
    $template = new Template('templates/factuuroverzicht-template.php');
    $template->navbarChatInfo = $userChatInfo->getMessages($_SESSION['id']);
    $template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
    $template->berichtenInDropdown = $userChatInfo->getMessagesInDropdown($_SESSION['id']);
    $template->producten = $producten->showAllProducts();
    $template->diensten = $diensten->showAllDiensten();
    $template->facturen = $facturen->getAllInvoices();
    echo $template;
}

if (isset($_GET['bekijkid'])) {
    $template = new Template('templates/factuur-template.php');
    $factuur_id = $_GET['bekijkid'];
    $template->factuurInfo = $facturen->getCustomerInvoice($factuur_id);
    echo $template;
}

if (isset($_GET['bekijk_facturen'])) {
    $template = new Template('templates/factuuroverzicht-template.php');
    $id = $_GET['bekijk_facturen'];
    $template->facturen = $facturen->getAllInvoices($id);
    echo $template;
}