<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;
$producten = new Product;
$diensten = new Dienst;

//klant verwijderen
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('klanten.php', 'Er is iets misgegaan', 'error');
    } else {

        if ($klanten->deleteCustomer($id)) {
            redirect('klanten.php', 'Succesvol verwijderd', 'error');
        } else {
            redirect('klanten.php', 'Er is iets misgegaan', 'error');
        }
    }
}

//verwijder afspraak
if (isset($_GET['afspr_del_id'])) {
    $id = $_GET['afspr_del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('klanten.php', 'Er is iets misgegaan', 'error');
    } else {
        if ($afspraken->deleteAppointment($id)) {
            redirect('afspraak.php?overzichtafspraken', 'Afspraak verwijdert', 'success');
        } else {
            redirect('afspraak.php?overzichtafspraken', 'Er is iets misgegaan', 'error');
        }
    }
}

//product verwijderen
if (isset($_GET['product_del_id'])) {
    $id = $_GET['product_del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('products.php', 'Er is iets misgegaan', 'error');
    } else {

        if ($producten->deleteProduct($id)) {
            redirect('products.php', 'Succesvol verwijderd', 'error');
        } else {
            redirect('products.php', 'Er is iets misgegaan', 'error');
        }
    }
}

//dienst verwijderen
if (isset($_GET['dienst_del_id'])) {
    $id = $_GET['dienst_del_id'];

    //check of het id numeriek is
    if (!checkId($id)) {
        redirect('diensten.php', 'Er is iets misgegaan', 'error');
    } else {

        if ($diensten->deleteDienst($id)) {
            redirect('diensten.php', 'Succesvol verwijderd', 'error');
        } else {
            redirect('diensten.php', 'Er is iets misgegaan', 'error');
        }
    }
}