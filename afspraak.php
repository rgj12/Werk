<?php
include_once 'config/init.php';
require_once 'helpers/system_helper.php';

$template = new Template('templates/overzichtafspraken.php');
$klanten = new Klant;
$afspraken = new Afspraken;
$userChatInfo = new Chat;

//klant gegevens ophalen en naar js versturen
if (isset($_POST['af_id'])) {
    $id = $_POST['af_id'];
    $klant = $klanten->getCustomerInfo($id);
    echo json_encode($klant);
}

//klant afspraak gegevens ophalen en versturen naar js
if (isset($_POST['bk_afspraak_id'])) {
    $id = $_POST['bk_afspraak_id'];
    $klant = $klanten->getAppointments($id);
    echo json_encode($klant);
}

//krijg overzicht van alle afspraken
if (isset($_GET['overzichtafspraken'])) {
    $template->afspraken = $afspraken->getAllAppointments();
    $template->medewerkers = $afspraken->getMedewerkers();
    echo $template;
}

//zet een afspraak op voltooid
if (isset($_POST['completeAppointment'])) {
    $id = $_POST['complete_id'];
    $datum = $_POST['complete_datum'];
    if ($afspraken->completeAppointment($id, $datum)) {
        redirect('afspraak.php?overzichtafspraken', 'Afspraak compleet', 'success');
    } else {
        redirect('afspraak.php?overzichtafspraken', 'Eris iets misgegaan', 'error');
    }

}
//afspraak voltooien pagina
if (isset($_GET['voltooideafspraken'])) {
    $template = new Template('templates/voltooid_afspraken.php');
    $template->afspraken = $afspraken->getAllCompleteAppointments();
    echo $template;
}