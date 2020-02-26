<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$afspraken = new Afspraken;
$producten = new Product;
$diensten = new Dienst;
$facturen = new Factuur;
$users = new Register;

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
        $data['pprijs'] = number_format((float) $_POST['prijs'], 2, '.', '');

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
        $data['dprijs'] = number_format((float) $_POST['dienstprijs'], 2, '.', '');

        if ($diensten->addDienst($data)) {
            redirect('diensten.php', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('diensten.php', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('diensten.php', 'Vul alle velden in!', 'error');
    }
}

// user toevoegen
if (isset($_POST['maakUser'])) {
    $data = array();

    if (!empty($_POST['username']) || !empty($_POST['password'])) {

        $data['username'] = trim(htmlspecialchars($_POST['username']));
        $data['password'] = trim(htmlspecialchars($_POST['password']));
        $data['profiel_foto'] = 'users/profielfoto/' . $_POST['profiel_foto'];

        if ($users->registerUser($data)) {
            redirect('index.php', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('index.php', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('index.php', 'Vul alle velden in!', 'error');
    }
}

if (isset($_POST['maakFactuur'])) {
    $data = array();
    $data['vnaam'] = $_POST['voornaam'];
    $data['anaam'] = $_POST['achternaam'];
    $data['email'] = $_POST['email'];
    $data['straatnaam'] = $_POST['straatnaam'];
    $data['postcode'] = $_POST['postcode'];
    $data['woonplaats'] = $_POST['woonplaats'];
    $data['telefoon'] = $_POST['telefoonnummer'];
    $data['k_id'] = $_POST['id'];
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

    // echo $data['pp1'][1] . "<br>";
    // echo $data['pp2'][1] . "<br>";
    // echo $data['pp3'][1] . "<br>";
    // echo $data['dp1'][1] . "<br>";
    // echo $data['dp2'][1] . "<br>";
    // echo $data['dp3'][1] . "<br>";


    $data["btoptie"] = $_POST["betaalOpties"];

    $data["datum"] = date("Y/m/d");
    $data["totaal"] = number_format((float) $data["pp1"][1] + $data["pp2"][1] + $data["pp3"][1] + $data["dp1"][1] + $data["dp2"][1] + $data["dp3"][1], 2, '.', '');

    $data["totaalexBtw"] = number_format((float) $facturen->VAT($data), 2, '.', '');
    $data["totaalBTW"] =  number_format($data["totaal"] - $data["totaalexBtw"], 2, '.', '');

    if ($facturen->makeInvoice($data)) {
        // var_dump($facturen->makeInvoice($data));
        redirect('klanten.php', 'Factuur aangemaakt', 'success');
    } else {
        redirect('klanten.php', 'Er is iets misgegaan', 'error');
    }
}