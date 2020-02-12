<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/index-template.php');
$klanten = new Klant;
$template->klanten = $klanten->getAllCustomers();

echo $template;
