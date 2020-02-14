<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraak = new Afspraken;
//klant edit gegevens ophalen
if (isset($_POST['edit_id'])) {

    $id = $_POST['edit_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('klanten.php', 'Er is iets misgegaan', 'error');
    } else {
        $klant = $klanten->getCustomerInfo($id);
        echo json_encode($klant);
    }
}

//afspraak edit gegevens ophalen
if (isset($_POST['edit_afspr_id'])) {
    $id = $_POST['edit_afspr_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('klanten.php', 'Er is iets misgegaan', 'error');
    } else {
        $appointment = $afspraak->getAppointmentInfo($id);
        echo json_encode($appointment);
    }
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

//afspraak aanpassen
if (isset($_POST['editAppointment'])) {

    $data = array();
    $data['id'] = $_POST['editid'];
    $data['datum'] = $_POST['datum'];
    $data['tijd'] = $_POST['tijd'];
    $data['omschrijving'] = $_POST['omschrijving'];

    if ($afspraak->editAppointment($data)) {
        redirect('afspraak.php?overzichtafspraken', 'Succesvol aangepast', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'er is iets misgegaan', 'danger');
    }
}