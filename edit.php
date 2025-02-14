<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraak = new Afspraken;
$producten = new Product;
$diensten = new Dienst;
$facturen = new Factuur;
//klant edit gegevens ophalen
if (isset($_POST['edit_id'])) {

    $id = $_POST['edit_id'];

    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);

}

//afspraak edit gegevens ophalen
if (isset($_POST['edit_afspr_id'])) {
    $id = $_POST['edit_afspr_id'];
    $appointment = $afspraak->getAppointmentInfo($id);
    echo json_encode($appointment);

}

// product edit gegevens ophalen
if (isset($_POST['edit_product_id'])) {

    $id = $_POST['edit_product_id'];

    $product = $producten->getProductInfo($id);
    echo json_encode($product);

}

// dienst edit gegevens ophalen
if (isset($_POST['edit_dienst_id'])) {

    $id = $_POST['edit_dienst_id'];

    $dienst = $diensten->getDienstInfo($id);
    echo json_encode($dienst);

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
    $data['reden_bezoek'] = $_POST['editredenbezoek'];

    if ($klanten->editCustomer($data)) {
        redirect('klanten', 'Succesvol aangepast', 'success');
    } else {
        redirect('klanten', 'er is iets misgegaan', 'error');
    }
}

//afspraak aanpassen
if (isset($_POST['editAppointment'])) {

    $data = array();
    $data['id'] = $_POST['editid'];
    $data['datum'] = $_POST['datum'];
    $data['tijd'] = $_POST['tijd'];
    $data['omschrijving'] = $_POST['omschrijving'];
    $data['medewerker'] = $_POST['editmedewerker'];

    date_format(new DateTime($data['datum']), 'Y/m/d');
    date("H:i:s", strtotime($data['tijd']));

    if ($afspraak->editAppointment($data)) {
        redirect('afspraak.php?overzichtafspraken', 'Succesvol aangepast', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'er is iets misgegaan', 'error');
    }
}

// edit product
if (isset($_POST['editProduct'])) {

    $data = array();
    $data['id'] = $_POST['editid'];
    $data['pnaam'] = $_POST['editproductnaam'];
    $data['pprijs'] = $_POST['editprijs'];

    if ($producten->editProduct($data)) {
        redirect('producten', 'Succesvol aangepast', 'success');
    } else {
        redirect('producten', 'er is iets misgegaan', 'error');
    }
}

// edit dienst
if (isset($_POST['editDienst'])) {

    $data = array();
    $data['id'] = $_POST['editid'];
    $data['dnaam'] = $_POST['editdienstnaam'];
    $data['dprijs'] = $_POST['editdienstprijs'];

    if ($diensten->editDienst($data)) {
        redirect('diensten', 'Succesvol aangepast', 'success');
    } else {
        redirect('diensten', 'er is iets misgegaan', 'error');
    }
}

//gegevens in factuur editform zetten
if (isset($_POST['edit_factuur_id'])) {
    $id = $_POST['edit_factuur_id'];
    $factuurInfo = $facturen->getCustomerInvoice($id);
    echo json_encode($factuurInfo);

}

// edit factuur
if (isset($_POST['editFactuur'])) {

    $data = array();
    $data['vnaam'] = $_POST['editfactvoornaam'];
    $data['anaam'] = $_POST['editfactachternaam'];
    $data['email'] = $_POST['editfactemail'];
    $data['straatnaam'] = $_POST['editfactstraatnaam'];
    $data['postcode'] = $_POST['editfactpostcode'];
    $data['woonplaats'] = $_POST['editfactwoonplaats'];
    $data['tel'] = $_POST['editfacttel'];

    $data['btoptie'] = $_POST['betaalOpties'];
    $data['factnummer'] = $_POST['factuurnummer'];
    $data["pp1"] = $_POST['product1'];
    $data["pp2"] = $_POST['product2'];
    $data["pp3"] = $_POST['product3'];

    $data["dp1"] = $_POST['dienst1'];
    $data["dp2"] = $_POST['dienst2'];
    $data["dp3"] = $_POST['dienst3'];

    //deze if statements zijn raar, weet niet waarom maar anders werkt dit niet
    if (empty($data["pp1"])) {
        $data["pp1"] = " / 0";
    }
    if (empty($data["pp2"])) {
        $data["pp2"] = " / 0";
    }
    if (empty($data["pp3"])) {
        $data["pp3"] = " / 0";
    }

    if (empty($data["dp1"])) {
        $data["dp1"] = " / 0";
    }
    if (empty($data["dp2"])) {
        $data["dp2"] = " / 0";
    }
    if (empty($data["dp3"])) {
        $data["dp3"] = " / 0";
    }

    $data['pp1'] = explode("/", $data['pp1']);
    $data['pp2'] = explode("/", $data['pp2']);
    $data['pp3'] = explode("/", $data['pp3']);

    $data['dp1'] = explode("/", $data['dp1']);
    $data['dp2'] = explode("/", $data['dp2']);
    $data['dp3'] = explode("/", $data['dp3']);

    $data["datum"] = date("Y/m/d");
    $data["totaal"] = number_format((float) $data["pp1"][1] + $data["pp2"][1] + $data["pp3"][1] + $data["dp1"][1] + $data["dp2"][1] + $data["dp3"][1], 2, '.', '');

    $data["totaalexBtw"] = number_format((float) $facturen->VAT($data), 2, '.', '');
    $data["totaalBTW"] = number_format($data["totaal"] - $data["totaalexBtw"], 2, '.', '');

    if ($facturen->editInvoice($data)) {
        redirect('facturen', 'Succesvol aangepast', 'success');
    } else {
        redirect('facturen', 'er is iets misgegaan', 'error');
    }
}