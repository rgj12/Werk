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
    $data["k_id"] = $_POST["id"];
    $data["vnaam"] = $_POST["voornaam"];
    $data["anaam"] = $_POST["achternaam"];

    $data["pp1"] = explode("|", $_POST["product1"]);
    $data["pp2"] = explode("|", $_POST["product2"]);
    $data["pp3"] = explode("|", $_POST["product3"]);

    $data["dp1"] = explode("|", $_POST["dienst1"]);
    $data["dp2"] = explode("|", $_POST["dienst2"]);
    $data["dp3"] = explode("|", $_POST["dienst3"]);
//gebruik explode om ook de namen te krijgen
    //wat hieronder gecomment is is misschien niet eens nodig
    // $data["prod1"] = $_POST["product1"];
    // $data["prod2"] = $_POST["product2"];
    // $data["prod3"] = $_POST["product3"];

    // $data["dienst1"] = $_POST["dienst1"];
    // $data["dienst2"] = $_POST["dienst2"];
    // $data["dienst3"] = $_POST["dienst3"];

    $data["btoptie"] = $_POST["betaalOpties"];

    $data["datum"] = date("d/m/Y");
    $data["totaal"] = number_format((float) $data["pp1"][1] + $data["pp2"][1] + $data["pp3"][1] + $data["dp1"][1] + $data["dp2"][1] + $data["dp3"][1], 2, '.', '');

    $data["totaalexBtw"] = number_format((float) $facturen->VAT($data), 2, '.', '');
    $data["totaalBTW"] = $data["totaal"] - $data["totaalexBtw"];
    // echo ($data["totaal"]);

    if ($facturen->makeInvoice($data)) {
        redirect("klanten.php", "factuur aangemaakt", "success");
    } else {
        redirect("klanten.php", "Er is iets misgegaan", "error");
    }

}