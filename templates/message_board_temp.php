<?php
include 'inc/header.php';
require_once 'inc/klantenModals/toevoegModal.php';

?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include 'inc/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include 'inc/navbar.php';?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php displayMessage();?>
                <!-- Page Heading -->
                <?php if (empty($berichten)) {
    echo '<div class="chatarea"><div class="container berichtbox text-center">Geen berichten</div></div>';
} else {?>
                <h1 class="h3 mb-2 text-gray-800">Berichten</h1>
                <p class="mb-4">Overzicht berichten</p>

                <div class="chatarea">
                    <?php foreach (array_reverse($berichten) as $bericht): ?>
                    <?php
if ($bericht->gelezen == 'niet') {
    ?>
                    <div class="container berichtbox <?=$bericht->urgentie;?>">
                        <img src="<?=$bericht->profiel_foto;?>" alt="<?=$bericht->username;?>" style="width:100%;">

                        <?php if ($bericht->from_user_id == $_SESSION['id']) {
        $bericht->username = 'Ik';
    }?>

                        <sup><?=$bericht->username;?> (<?=$bericht->urgentie;?>
                            urgentie)</sup>
                        <a href="message_board.php?read=<?=$bericht->chat_message_id;?>" class="check fas fa-check"></a>
                        <p><b><?=$bericht->bericht;?></b></p>
                        <span class="time-right"><b><?=$bericht->time_stamp;?></b></span>
                    </div>
                    <?php }?>
                    <?php endforeach;?>


                </div>

                <div class="container berichtbox">
                    <form action="message_board.php" method="POST">
                        <input type="hidden" name="from" id="from" value="<?=$_SESSION['id'];?>">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <select class="form-control" name="to" id="to" required>
                                    <option value="" selected>Kies persoon</option>
                                    <?php
if ($_SESSION['level'] == 1) {
    echo '<option value="0">Iedereen</option>';
}?>
                                    <?php foreach ($users as $user): ?>
                                    <option value="<?=$user->id?>"><?=$user->username;?></option>
                                    <?php endforeach;?>
                                </select><br>
                                <select class="form-control" name="urgentie" id="urgentie" required>
                                    <option value="" selected>Kies urgentie</option>
                                    <option value="laag">Laag</option>
                                    <option value="gemiddeld">Gemiddeld</option>
                                    <option value="hoog">Hoog</option>
                                </select>
                            </span>&nbsp;&nbsp;&nbsp;
                            <input class="form-control" type="text" name="bericht" id="bericht"
                                placeholder="Voer een bericht in" required>&nbsp;
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-success sendMessage" name="sendMessage"
                                    value="Verzend bericht">
                            </span>
                        </div>
                    </form>
                </div>
                <?php }?>
            </div>

        </div>

        <!-- End of Main Content -->
        <!-- <?php include './inc/footer.php';?> -->