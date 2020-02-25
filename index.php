<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/index-template.php');
$klanten = new Klant;
$userChatInfo = new Chat;
$index = new Index;

$template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
$template->klanten = $klanten->getAllCustomers();
$template->dagOmzet = number_format((float) $index->getDailyEarnings(), 2, '.', '');
$template->jaarOmzet = number_format((float) $index->getYearlyEarnings(), 2, '.', '');
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

if (isset($_POST['chatMessage'])) {
    $data = array();
    $data['receiver'] = $_POST['receiver'];
    $data['sender'] = $_SESSION['id'];
    var_dump($_POST['chatMessage']);

    if ($userChatInfo->getChat($data['sender'], $data['receiver'])) {
    } else {
        echo 'error';
    }
}

echo $template;