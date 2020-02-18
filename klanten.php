<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/klanten-template.php');
$klanten = new Klant;
$userChatInfo = new Chat;
$producten = new Product;
$diensten = new Dienst;

$template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);

//lees klanten uit
$template->klanten = $klanten->getAllCustomers();
$template->producten = $producten->showAllProducts();
$template->diensten = $diensten->showAllDiensten();
echo $template;