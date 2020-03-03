<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/product-template.php');
$producten = new Product;
$userChatInfo = new Chat;

$template->producten = $producten->showAllProducts();
echo $template;