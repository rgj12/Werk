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
    $data = array();
    var_dump($_POST);



    // $data["btoptie"] = $_POST["betaalOpties"];

    // $data["datum"] = date("Y/m/d");
    // $data["totaal"] = number_format((float) $data["pp1"][1] + $data["pp2"][1] + $data["pp3"][1] + $data["dp1"][1] + $data["dp2"][1] + $data["dp3"][1], 2, '.', '');

    // $data["totaalexBtw"] = number_format((float) $facturen->VAT($data), 2, '.', '');
    // $data["totaalBTW"] = $data["totaalexBtw"] - $data["totaal"];



}