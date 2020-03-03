<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/message_board_temp.php');
$userChatInfo = new Chat;

$template->berichten = $userChatInfo->getMessages($_SESSION['id']);
$template->aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
$template->users = $userChatInfo->getUsers();

if (isset($_POST['sendMessage'])) {
    $data = array();
    $data['from'] = $_POST['from'];
    $data['to'] = $_POST['to'];
    $data['bericht'] = $_POST['bericht'];
    $data['urgentie'] = $_POST['urgentie'];
    var_dump($_POST);
}
echo $template;