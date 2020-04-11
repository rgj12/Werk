<?php
include 'inc/header.php';
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include 'inc/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include 'inc/navbar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php displayMessage(); ?>
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Overzicht afspraken</h1>
                <p class="mb-4"></p>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a class="btn btn-success" href="calendar.php"><i class="fas fa-plus" aria-hidden="true"> Maak
                                afspraak</i></a>
                        <a class="btn btn-success" href="afspraak.php?voltooideafspraken"><i class="fas fa-eye"
                                aria-hidden="true"> Bekijk voltooide afspraken</i></a>
                        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Voornaam</th>
                                        <th>Achternaam</th>
                                        <th>datum</th>
                                        <th>tijd</th>
                                        <th>omschrijving</th>
                                        <th>Mederwerker</th>
                                        <th>Actie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($afspraken as $afspraak) : ?>
                                    <tr>

                                        <td><?= $afspraak->naam; ?></td>
                                        <td><?= $afspraak->achternaam; ?></td>
                                        <td><?= date_format(new dateTime($afspraak->datum), "d-m-Y"); ?></td>
                                        <td><?= date("H:i", strtotime($afspraak->tijd)); ?> uur</td>
                                        <td><?= $afspraak->omschrijving; ?></td>
                                        <td><?= $afspraak->medewerker; ?></td>
                                        <td>
                                            <a href="#" style="color:green;" data-toggle="modal"
                                                data-target="#completeApp" id="<?= $afspraak->afspraak_id ?>"
                                                class="fa fa-check fa-lg"></a> |&nbsp;
                                            <a class="fa fa-edit fa-lg edit_afspr_Btn" href="#" data-toggle="modal"
                                                data-target="#editModal" id="<?= $afspraak->afspraak_id ?>"
                                                title="Pas afspraak aan" style="color:orange;">
                                            </a> |&nbsp;
                                            <a href="delete.php?afspr_del_id=<?= $afspraak->afspraak_id ?>"
                                                title="Verwijder afspraak" class="fa fa-trash fa-lg" style="color:red;"
                                                onclick="return confirm('Weet je zeker dat je deze klant wilt verwijderen?')"></a>

                                        </td>
                                    </tr>

                                    <?php endforeach; ?>
                                    <!-- Modals-->
                                    <?php
                                    /* Modal voor editen */
                                    include 'inc/afspraakModals/afspraak_completeModal.php';
                                    include 'inc/afspraakModals/editModal.php';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php include './inc/footer.php'; ?>