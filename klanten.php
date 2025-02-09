<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/klanten-template.php');
$klanten = new Klant;
$userChatInfo = new Chat;
$producten = new Product;
$diensten = new Dienst;

//lees klanten uit
$template->klanten = $klanten->getAllCustomers();
$template->producten = $producten->showAllProducts();
$template->diensten = $diensten->showAllDiensten();
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
$template->berichtenInDropdown = $userChatInfo->getMessagesInDropdown($_SESSION['id']);
$template->medewerkers = $klanten->getMedewerkers();
echo $template;