<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;

//klant gegevens ophalen en naar js versturen
if (isset($_POST['af_id'])) {
    $id = $_POST['af_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
}

//klant afspraak gegevens ophalen en versturen naar js
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

//zet een afspraak op voltooid
if (isset($_GET['afspr_voltooid'])) {
    $id = $_GET['afspr_voltooid'];

    if ($afspraken->completeAppointment($id)) {
        redirect('afspraak.php?overzichtafspraken', 'Afspraak voltooid', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'Er is iets misgegaan', 'error');
    }
}