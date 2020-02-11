<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
//klant edit gegevens ophalen
if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
}

//klant aanpassen
if (isset($_POST['editKlant'])) {

    $data = array();
    $data['id'] = $_POST['editid'];
    $data['vnaam'] = $_POST['editvoornaam'];
    $data['anaam'] = $_POST['editachternaam'];
    $data['mail'] = $_POST['editemail'];
    $data['stnaam'] = $_POST['editstraatnaam'];
    $data['pcode'] = $_POST['editpostcode'];
    $data['wplaats'] = $_POST['editwoonplaats'];
    $data['tel'] = $_POST['edittelefoonnummer'];

    if ($klanten->editCustomer($data)) {
        redirect('klanten.php', 'Succesvol aangepast', 'success');
    } else {
        redirect('klanten.php', 'er is iets misgegaan', 'danger');
    }
}