<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;
$producten = new Product;
$diensten = new Dienst;
$factuur = new Factuur;

//klant verwijderen
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('klanten', 'Er is iets misgegaan', 'error');
    } else {

        if ($klanten->deleteCustomer($id)) {
            redirect('klanten', 'Succesvol verwijderd', 'error');
        } else {
            redirect('klanten', 'Er is iets misgegaan', 'error');
        }
    }
}

//verwijder afspraak
if (isset($_GET['afspr_del_id'])) {
    $id = $_GET['afspr_del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('klanten', 'Er is iets misgegaan', 'error');
    } else {
        if ($afspraken->deleteAppointment($id)) {
            redirect('afspraken', 'Afspraak verwijdert', 'success');
        } else {
            redirect('afspraken', 'Er is iets misgegaan', 'error');
        }
    }
}

//product verwijderen
if (isset($_GET['product_del_id'])) {
    $id = $_GET['product_del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('producten', 'Er is iets misgegaan', 'error');
    } else {

        if ($producten->deleteProduct($id)) {
            redirect('producten', 'Succesvol verwijderd', 'error');
        } else {
            redirect('producten', 'Er is iets misgegaan', 'error');
        }
    }
}

//dienst verwijderen
if (isset($_GET['dienst_del_id'])) {
    $id = $_GET['dienst_del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('diensten', 'Er is iets misgegaan', 'error');
    } else {

        if ($diensten->deleteDienst($id)) {
            redirect('diensten', 'Succesvol verwijderd', 'error');
        } else {
            redirect('diensten', 'Er is iets misgegaan', 'error');
        }
    }
}

//factuur verwijderen
if (isset($_GET['fact_del_id'])) {

    if ($factuur->deleteFactuur(decryptId())) {
        redirect('facturen', 'factuur verwijderd', 'success');
    } else {
        redirect('facturen', 'Er is iets misgegaan', 'error');
    }
}