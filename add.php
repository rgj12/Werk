<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;

//klanten toevoegen
if (isset($_POST['toevoegen'])) {
    $data = array();

    $data['vnaam'] = $_POST['voornaam'];
    $data['anaam'] = $_POST['achternaam'];
    $data['mail'] = $_POST['email'];
    $data['stnaam'] = $_POST['straatnaam'];
    $data['pcode'] = $_POST['postcode'];
    $data['wplaats'] = $_POST['woonplaats'];
    $data['tel'] = $_POST['telefoonnummer'];
    $data['reden'] = $_POST['reden'];

    if ($klanten->addCustomer($data)) {
        redirect('klanten.php', 'Succesvol toegevoegd', 'success');
    } else {
        redirect('klanten.php', 'Er is iets misgegaan', 'danger');
    }

}

//maak afspraak voor klant
if (isset($_POST['maakAfspraak'])) {
    $data = array();
    $data['id'] = $_POST['af_id'];
    $data['datum'] = $_POST['af_datum'];
    $data['tijd'] = $_POST['af_tijd'];
    $data['omschr'] = $_POST['af_omschrijving'];
    if ($klanten->makeAppointment($data)) {
        redirect('klanten.php', 'afspraak aangemaakt', 'success');
    } else {
        redirect('klanten.php', 'er is iets misgegaan', 'error');
    }
}