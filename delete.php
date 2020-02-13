<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;

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

//verwijder afspraak
if (isset($_GET['afspr_del_id'])) {
    $id = $_GET['afspr_del_id'];

    if ($afspraken->deleteAppointment($id)) {
        redirect('afspraak.php?overzichtafspraken', 'Afspraak verwijdert', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'Er is iets misgegaan', 'error');
    }
}