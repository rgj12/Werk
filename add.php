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
            redirect('klanten', 'Vul een juiste email in', 'error');
        }

        if ($klanten->addCustomer($data)) {
            redirect('klanten', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('klanten', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('klanten', 'Vul alle velden in!', 'error');
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
        redirect('klanten', 'afspraak aangemaakt', 'success');
    } else {
        redirect('klanten', 'er is iets misgegaan', 'error');
    }
}

// product toevoegen
if (isset($_POST['maakProduct'])) {
    $data = array();

    if (!empty($_POST['productnaam']) || !empty($_POST['prijs'])) {

        $data['pnaam'] = trim(htmlspecialchars($_POST['productnaam']));
        $data['pprijs'] = number_format((float) $_POST['prijs'], 2, '.', '');

        if ($producten->addProduct($data)) {
            redirect('producten', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('producten', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('producten', 'Vul alle velden in!', 'error');
    }
}

// dienst toevoegen
if (isset($_POST['maakDienst'])) {
    $data = array();

    if (!empty($_POST['dienstnaam']) || !empty($_POST['dienstprijs'])) {

        $data['dnaam'] = trim(htmlspecialchars($_POST['dienstnaam']));
        $data['dprijs'] = number_format((float) $_POST['dienstprijs'], 2, '.', '');

        if ($diensten->addDienst($data)) {
            redirect('diensten', 'Succesvol toegevoegd', 'success');
        } else {
            redirect('diensten', 'Er is iets misgegaan', 'error');
        }
    } else {
        redirect('diensten', 'Vul alle velden in!', 'error');
    }
}

// user toevoegen
if (isset($_POST['maakUser'])) {
    $data = array();

    if (!empty($_POST['username']) || !empty($_POST['password']) || !empty($_POST['email'])) {
        //gebruikersnaam mag alleen letters en cijfers bevatten en een underscore
        if (!preg_match('/^[a-zA-Z0-9]*_?[a-zA-Z0-9]*$/', $_POST['username'])) {
            redirect('home', 'Er is iets misgegaan met de gebruiker toevoegen', 'error');
        } else {

            $data['username'] = trim(htmlspecialchars($_POST['username']));
            $data['email'] = $_POST['email'];
            $data['password'] = trim(htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)));
            //email checken op juiste format
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                redirect('home', 'Er is iets misgegaan met gebruiker toevoegen', 'error');
            }

            if (empty($_POST['profiel_foto'])) {
                $data['profiel_foto'] = 'users/profielfoto/Default-Profile.png';
            } else {
                $data['profiel_foto'] = 'users/profielfoto/' . $_POST['profiel_foto'];
            }
            //check of gebruikersnaam uniek is
            if ($users->checkUsername($data['username']) > 0) {
                redirect('home', 'Gebruikersnaam al in bezit!', 'error');
            } else {
                if ($users->registerUser($data)) {
                    redirect('home', 'Gebruiker aan gemaakt!', 'success');
                } else {
                    redirect('home', 'Er is iets misgegaan', 'error');
                }
            }
        }
    } else {
        redirect('home', 'Vul alle velden in!', 'error');
    }
}
//facturen aanmaken
if (isset($_POST['maakFactuur'])) {
    $data = array();
    $rows = $facturen->getInvoiceRows();
    $data['id'] = $rows + 1;
    $data['vnaam'] = $_POST['voornaam'];
    $data['tussenvoegsels'] = $_POST['tussenvoegsels'];
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

    $data["btoptie"] = $_POST["betaalOpties"];

    $data["datum"] = date("Y/m/d");
    $data["totaal"] = number_format((float) $data["pp1"][1] + $data["pp2"][1] + $data["pp3"][1] + $data["dp1"][1] + $data["dp2"][1] + $data["dp3"][1], 2, '.', '');

    $data["totaalexBtw"] = number_format((float) $facturen->VAT($data), 2, '.', '');
    $data["totaalBTW"] = number_format($data["totaal"] - $data["totaalexBtw"], 2, '.', '');

    if ($facturen->makeInvoice($data)) {
        if ($data['pp1'][0] !== " / 0") {
            $producten->aantalVerkocht($data['pp1'][0]);
        }
        if ($data['pp2'][0] !== " / 0") {
            $producten->aantalVerkocht($data['pp2'][0]);
        }
        if ($data['pp3'][0] !== " / 0") {
            $producten->aantalVerkocht($data['pp3'][0]);
        }
        if ($data['dp1'][0] !== " / 0") {
            $diensten->aantalVerkocht($data['dp1'][0]);
        }
        if ($data['dp2'][0] !== " / 0") {
            $diensten->aantalVerkocht($data['dp2'][0]);
        }
        if ($data['dp3'][0] !== " / 0") {
            $diensten->aantalVerkocht($data['dp3'][0]);
        }

        redirect('klanten', 'Factuur aangemaakt', 'success');
    } else {
        redirect('klanten', 'Er is iets misgegaan', 'error');
    }
}