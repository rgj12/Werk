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
                <h1 class="h3 mb-2 text-gray-800">Berichten</h1>
                <p class="mb-4">Overzicht berichten</p>
                <?php foreach ($berichten as $bericht): ?>
                <div class="container">
                    <img src="<?=$bericht->profiel_foto;?>" alt="<?=$bericht->username;?>" style="width:100%;">
                    <p><?=$bericht->chat_message;?></p>
                    <span class="time-right"><?=$bericht->time_stamp;?></span>
                </div>
                <?php endforeach;?>



            </div>
            <!-- /.container-fluid -->

        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="container">
                    <form action="message_board.php" method="POST">
                        <input type="hidden" name="from" id="from" value="<?=$_SESSION['id'];?>">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <select class="form-control" name="to" id="to" required>
                                    <option value="" selected>Kies persoon</option>
                                    <option value="0">Iedereen</option>
                                    <?php foreach ($users as $user): ?>
                                    <option value="<?=$user->id?>"><?=$user->username;?></option>
                                    <?php endforeach;?>
                                </select><br>
                                <select class="form-control" name="urgentie" id="urgentie" required>
                                    <option value="" selected>Kies urgentie</option>
                                    <option value="1">Laag</option>
                                    <option value="2">Gemiddeld</option>
                                    <option value="2">Hoog</option>
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
            </div>
        </div>
        <!-- End of Main Content -->
        <?php include './inc/footer.php';?>