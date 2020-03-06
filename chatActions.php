<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$userChatInfo = new Chat;

if (isset($_POST['action']) && $_POST['action'] == 'viewChatmessages') {
    $berichtenInDropdown = $userChatInfo->getMessagesInDropdown($_SESSION['id']);

    $output = '';

    foreach ($berichtenInDropdown as $bericht) {
        $output .= '<a class="dropdown-item d-flex align-items-center" href="message_board.php" id="openchat">
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

    echo $output;
}

if (isset($_POST['action']) && $_POST['action'] == 'viewMessageBoard') {
    $berichtenInBoard = $userChatInfo->getMessages($_SESSION['id']);
    $output = '';
    foreach (array_reverse($berichtenInBoard) as $bericht) {
        if ($bericht->gelezen == 'niet') {
            if ($bericht->from_user_id == $_SESSION['id']) {
                $bericht->username = 'Ik';
                $output .= '<div id="bericht_box" class="container berichtbox ' . $bericht->urgentie . '">
                <img src="' . $bericht->profiel_foto . '" alt="' . $bericht->profiel_foto . '" style="width:100%;">
                <sup>' . $bericht->username . ' (' . $bericht->urgentie . ' urgentie)</sup>
                <a href="message_board.php?delete=' . $bericht->chat_message_id . '"style="color:white;" class="check fas fa-trash-alt"></a>
                <p><b>' . $bericht->bericht . '</b></p>
                <span class="time-right"><b>' . $bericht->time_stamp . '</b></span>
    </div>';
            } else {
                $output .= '<div id="bericht_box" class="container berichtbox ' . $bericht->urgentie . '">
            <img src="' . $bericht->profiel_foto . '" alt="' . $bericht->profiel_foto . '" style="width:100%;">
            <sup>' . $bericht->username . ' (' . $bericht->urgentie . ' urgentie)</sup>
            <a href="message_board.php?read=' . $bericht->chat_message_id . '" class="check fas fa-check"></a>
            <p><b>' . $bericht->bericht . '</b></p>
            <span class="time-right"><b>' . $bericht->time_stamp . '</b></span>
</div>';
            }
        }
    }
    echo $output;
}

if (isset($_POST['action']) && $_POST['action'] == 'viewMessageNumber') {
    $aantalBerichten = $userChatInfo->getNumberOfMessages($_SESSION['id']);
    echo $aantalBerichten;
}