<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/klanten-template.php');
$klanten = new Klant;

$template->klanten = $klanten->getAllCustomers();

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

//klant verwijderen
if (isset($_GET['del_id'])) {

    $id = $_GET['del_id'];
    if (is_numeric($id)) {
        if ($klanten->deleteCustomer($id)) {
            redirect('klanten.php', 'Succesvol verwijderd', 'success');
        } else {
            redirect('klanten.php', 'Er is iets misgegaan', 'danger');
        }
    }
}

echo $template;