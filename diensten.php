<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';


$template = new Template('templates/dienst-template.php');
$diensten = new Dienst;
$template->diensten = $diensten->showAllDiensten();
$userChatInfo = new Chat;

$template->navbarChatInfo = $userChatInfo->getMessage($_SESSION['id']);
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);

echo $template;