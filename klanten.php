<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/klanten-template.php');
$klanten = new Klant;

//lees klanten uit
$template->klanten = $klanten->getAllCustomers();
echo $template;