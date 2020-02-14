<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/index-template.php');
$klanten = new Klant;
$userChatInfo = new Chat;

$template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
$template->klanten = $klanten->getAllCustomers();

echo $template;