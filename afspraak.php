<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;

//klant afspraak gegevens ophalen
if (isset($_POST['af_id'])) {
    $id = $_POST['af_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
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

//klant afspraak gegevens ophalen
if (isset($_POST['bk_afspraak_id'])) {
    $id = $_POST['bk_afspraak_id'];
    $klant = $klanten->getAppointments($id);
    echo json_encode($klant);
}

//krijg overzicht van alle afspraken
if (isset($_GET['overzichtafspraken'])) {
    $template = new Template('templates/overzichtafspraken.php');
    $template->afspraken = $afspraken->getAllAppointments();
    echo $template;
}
//verwijder afspraak
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    if ($afspraken->deleteAppointment($id)) {
        redirect('afspraak.php?overzichtafspraken', 'Afspraak verwijdert', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'Er is iets misgegaan', 'error');
    }
}

//zet een afspraak op voltooid
if (isset($_GET['afspr_voltooid'])) {
    $id = $_GET['afspr_voltooid'];

    if ($afspraken->completeAppointment($id)) {
        redirect('afspraak.php?overzichtafspraken', 'Afspraak voltooid', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'Er is iets misgegaan', 'error');
    }
}