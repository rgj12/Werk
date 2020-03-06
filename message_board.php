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
        redirect('berichten', 'bericht verstuurd', 'success');
    } else {
        redirect('berichten', 'er is iets misgegaan', 'error');
    }
}

if (isset($_GET['read'])) {
    $id = $_GET['read'];
    if ($userChatInfo->updateMessage($id)) {
        redirect('berichten', 'success', 'success');
    } else {
        redirect('berichten', 'er is iets missgegaan', 'error');
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if ($userChatInfo->deleteMessage($id)) {
        redirect('berichten', 'verwijdert', 'success');
    } else {
        redirect('berichten', 'er is iets misgegaan', 'error');
    }

}

echo $template;