<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/message_board_temp.php');
$userChatInfo = new Chat;
$template->berichtenInDropdown = $userChatInfo->getMessagesInDropdown($_SESSION['id']);
$template->users = $userChatInfo->getUsers();

if (isset($_POST['sendMessage'])) {
    $data = array();
    $data['gelezen'] = 'niet';
    $data['from'] = $_POST['from'];
    $data['to'] = $_POST['to'];
    $data['bericht'] = strip_tags($_POST['bericht']);
    $data['urgentie'] = $_POST['urgentie'];

    if ($userChatInfo->sendMessage($data)) {
        redirect('message_board.php', 'bericht verstuurd', 'success');
    } else {
        redirect('message_board.php', 'er is iets misgegaan', 'error');
    }
}

if (isset($_GET['read'])) {
    $id = $_GET['read'];
    if ($userChatInfo->updateMessage($id)) {
        redirect('message_board.php', 'success', 'success');
    } else {
        redirect('message_board.php', 'er is iets missgegaan', 'error');
    }
}

echo $template;