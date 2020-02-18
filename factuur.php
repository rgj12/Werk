<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$userChatInfo = new Chat;
$facturen = new Factuur;

if (isset($_POST['fk_id'])) {
    $id = $_POST['fk_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);

}

if (isset($_GET['overzicht'])) {
    $template = new Template('templates/factuuroverzicht-template.php');
    $template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
    $template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
    $template->facturen = $facturen->getAllInvoices();
    echo $template;
}

if (isset($_POST['maakFactuur'])) {

    preg_match_all('!\d+!', $_POST['product1'], $product1);
    preg_match_all('!\d+!', $_POST['product2'], $product2);
    var_dump($product1[0]);
    var_dump($product2[0]);
}