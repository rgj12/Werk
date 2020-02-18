<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$klanten = new Klant;
$template = new Template('templates/factuur-template.php');

if (isset($_POST['fk_id'])) {
    $id = $_POST['fk_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
}

if (isset($_GET['overzicht'])) {
    echo $template;
}