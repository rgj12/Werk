<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/index-template.php');
$klanten = new Klant;
$userChatInfo = new Chat;
$index = new Index;
$producten = new Product;
$diensten = new Dienst;

$template->klanten = $klanten->getAllCustomers();
$template->producten = $producten->showAllProducts();
$template->diensten = $diensten->showAllDiensten();
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
$template->berichtenInDropdown = $userChatInfo->getMessagesInDropdown($_SESSION['id']);

//omzet tonen
$template->dagOmzet = number_format((float) $index->getDailyEarnings(), 2, '.', '');
$template->jaarOmzet = number_format((float) $index->getYearlyEarnings(), 2, '.', '');
$template->totaalverkochteproducten = $producten->totaalVerkocht();
$template->totaalverkochtediensten = $diensten->totaalVerkocht();

$template->janomzet = $index->getMonthlyEarnings(date("Y") . "-01");
$template->febomzet = $index->getMonthlyEarnings(date("Y") . "-02");
$template->maomzet = $index->getMonthlyEarnings(date("Y") . "-03");
$template->apomzet = $index->getMonthlyEarnings(date("Y") . "-04");
$template->meiomzet = $index->getMonthlyEarnings(date("Y") . "-05");
$template->junomzet = $index->getMonthlyEarnings(date("Y") . "-06");
$template->julomzet = $index->getMonthlyEarnings(date("Y") . "-07");
$template->augomzet = $index->getMonthlyEarnings(date("Y") . "-08");
$template->sepomzet = $index->getMonthlyEarnings(date("Y") . "-09");
$template->okomzet = $index->getMonthlyEarnings(date("Y") . "-10");
$template->novomzet = $index->getMonthlyEarnings(date("Y") . "-11");
$template->decomzet = $index->getMonthlyEarnings(date("Y") . "-12");
//afspraken info tonen
$template->aantalAfspraken = $index->getAppointmentsNotComplete();
$template->aantalAfsprakenComplete = $index->getAppointmentsComplete();
$template->percentageCompleet = $index->percentageComplete($template->aantalAfsprakenComplete, $template->aantalAfspraken);

//$template->chatMessage = $userChatInfo->getChat($_SESSION['id'], $_POST['receiver']);

if (isset($_POST['sendMessage'])) {
    $data = array();
    $data['bericht'] = $_POST['bericht'];
    $data['receiver'] = $_POST['receiver'];
    $data['sender'] = $_POST['sender'];

    if ($userChatInfo->sendMessage($data)) {
        redirect('index.php', 'gelukt', 'success');
    } else {
        redirect('index.php', 'er is iets misgegaan', 'danger');
    }
}

// if (isset($_POST['chatMessage'])) {
//     $data = array();
//     $data['receiver'] = $_POST['receiver'];
//     $data['sender'] = $_SESSION['id'];
//     var_dump($_POST['chatMessage']);

//     if ($userChatInfo->getChat($data['sender'], $data['receiver'])) {
//     } else {
//         echo 'error';
//     }
// }

echo $template;