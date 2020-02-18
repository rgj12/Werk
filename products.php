<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';


$template = new Template('templates/product-template.php');
$producten = new Product;
$template->producten = $producten->showAllProducts();
echo $template;