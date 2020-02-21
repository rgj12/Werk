<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/index-template.php');
$klanten = new Klant;
$userChatInfo = new Chat;

$template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
$template->klanten = $klanten->getAllCustomers();

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

echo $template;