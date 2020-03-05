<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$userChatInfo = new Chat;

if (isset($_POST['action']) && $_POST['action'] == 'viewChatmessages') {
    $berichtenInDropdown = $userChatInfo->getMessagesInDropdown($_SESSION['id']);
    $output = '';
    if (empty($berichtenInDropdown)) {
        $output = '<p class="text-center">Geen berichten</p>';
    } else {
        foreach ($berichtenInDropdown as $bericht) {
            $output .= '<a class="dropdown-item d-flex align-items-center" href="#" id="openchat">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="' . $bericht->profiel_foto . '" alt="">
            <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
            <div class="text-truncate">' . $bericht->bericht . '</div>
            <div class="small text-gray-500">' . $bericht->username . '</div>
        </div>
    </a>';
        }
    }

    echo $output;
}