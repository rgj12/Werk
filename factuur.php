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
    $data['vnaam'] = $_POST['voornaam'];
    $data['anaam'] = $_POST['achternaam'];
    $data['k_id'] = $_POST['id'];
    $data["pp1"] = $_POST['product1'];
    $data["pp2"] = $_POST['product2'];
    $data["pp3"] = $_POST['product3'];

    $data["dp1"] = $_POST['dienst1'];
    $data["dp2"] = $_POST['dienst2'];
    $data["dp3"] = $_POST['dienst3'];

    //deze if statements zijn raar, weet niet waarom maar anders werkt dit niet
    if (empty($data["pp1"])) {
        $data["pp1"] = " / 0";
    }
    if (empty($data["pp2"])) {
        $data["pp2"] = " / 0";
    }
    if (empty($data["pp3"])) {
        $data["pp3"] = " / 0";
    }

    if (empty($data["dp1"])) {
        $data["dp1"] = " / 0";
    }
    if (empty($data["dp2"])) {
        $data["dp2"] = " / 0";
    }
    if (empty($data["dp3"])) {
        $data["dp3"] = " / 0";
    }

    $data['pp1'] = explode("/", $data['pp1']);
    $data['pp2'] = explode("/", $data['pp2']);
    $data['pp3'] = explode("/", $data['pp3']);

    $data['dp1'] = explode("/", $data['dp1']);
    $data['dp2'] = explode("/", $data['dp2']);
    $data['dp3'] = explode("/", $data['dp3']);

    // echo $data['pp1'][1] . "<br>";
    // echo $data['pp2'][1] . "<br>";
    // echo $data['pp3'][1] . "<br>";
    // echo $data['dp1'][1] . "<br>";
    // echo $data['dp2'][1] . "<br>";
    // echo $data['dp3'][1] . "<br>";


    $data["btoptie"] = $_POST["betaalOpties"];

    $data["datum"] = date("Y/m/d");
    $data["totaal"] = number_format((float) $data["pp1"][1] + $data["pp2"][1] + $data["pp3"][1] + $data["dp1"][1] + $data["dp2"][1] + $data["dp3"][1], 2, '.', '');

    $data["totaalexBtw"] = number_format((float) $facturen->VAT($data), 2, '.', '');
    $data["totaalBTW"] =  $data["totaal"] - $data["totaalexBtw"];

    if ($facturen->makeInvoice($data)) {
        // var_dump($facturen->makeInvoice($data));
        redirect('klanten.php', 'Factuur aangemaakt', 'success');
    } else {
        redirect('klanten.php', 'Er is iets misgegaan', 'error');
    }
}

if (isset($_GET['bekijkid'])) {
    $factuur_id = $_GET['bekijkid'];
    $template = new Template('templates/factuur-template.php');
    $template->factuurInfo = $facturen->getCustomerInvoice($factuur_id);
    echo $template;
}