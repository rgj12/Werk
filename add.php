<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;
$producten = new Product;
$diensten = new Dienst;

//klanten toevoegen
if (isset($_POST['toevoegen'])) {

    $data = array();

    //valideer input
    if (!empty($_POST['voornaam']) || !empty($_POST['achternaam']) || !empty($_POST['email']) || !empty($_POST['straatnaam']) || !empty($_POST['postcode']) || !empty($_POST['woonplaats']) || !empty($_POST['telefoonnummer']) || !empty($_POST['reden'])) {

        $data['vnaam'] = trim(htmlspecialchars($_POST['voornaam']));
        $data['anaam'] = trim(htmlspecialchars($_POST['achternaam']));
        $data['mail'] = $_POST['email'];
        $data['stnaam'] = trim(htmlspecialchars($_POST['straatnaam']));
        $data['pcode'] = $_POST['postcode'];
        $data['wplaats'] = trim(htmlspecialchars($_POST['woonplaats']));
        $data['tel'] = $_POST['telefoonnummer'];
        $data['reden'] = trim(htmlspecialchars($_POST['reden']));

        //valideer email
        $data['mail'] = filter_var($data['mail'], FILTER_VALIDATE_EMAIL);

        if ($data['mail'] == false) {
            redirect('klanten.php', 'Vul een juiste email in', 'error');
        }

        if ($klanten->addCustomer($data)) {
            redirect('klanten.php', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('klanten.php', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('klanten.php', 'Vul alle velden in!', 'error');
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

// product toevoegen 
if (isset($_POST['maakProduct'])) {
    $data = array();

    if (!empty($_POST['productnaam']) || !empty($_POST['prijs'])) {

        $data['pnaam'] = trim(htmlspecialchars($_POST['productnaam']));
        $data['pprijs'] = $_POST['prijs'];

        if ($producten->addProduct($data)) {
            redirect('products.php', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('products.php', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('products.php', 'Vul alle velden in!', 'error');
    }
}

// dienst toevoegen 
if (isset($_POST['maakDienst'])) {
    $data = array();

    if (!empty($_POST['dienstnaam']) || !empty($_POST['dienstprijs'])) {

        $data['dnaam'] = trim(htmlspecialchars($_POST['dienstnaam']));
        $data['dprijs'] = $_POST['dienstprijs'];

        if ($diensten->addDienst($data)) {
            redirect('diensten.php', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('diensten.php', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('diensten.php', 'Vul alle velden in!', 'error');
    }
}