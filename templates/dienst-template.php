<?php
include 'inc/header.php';
require_once 'inc/dienstModals/toevoegModal.php';

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
                <h1 class="h3 mb-2 text-gray-800">Diensten</h1>
                <p class="mb-4">Overzicht diensten</p>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i
                                class="fa fa-plus" aria-hidden="true"> Voeg dienst toe </i></button>
                        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Diensten</th>
                                        <th>Prijs</th>
                                        <th>Actie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($diensten as $dienst) : ?>
                                    <tr>
                                        <td><?= $dienst->dienstnaam;  ?></td>
                                        <td>€<?= $dienst->dienstprijs; ?></td>
                                        <td>
                                            <a class="fa fa-edit fa-lg edit_dienst_Btn" href="#" data-toggle="modal"
                                                data-target="#editModal" id="<?= $dienst->id ?>" title="Pas dienst aan"
                                                style="color:orange;">
                                            </a> |&nbsp;
                                            <a href="delete.php?dienst_del_id=<?= $dienst->id ?>"
                                                title="Verwijder klant" class="fa fa-trash fa-lg" style="color:red;"
                                                onclick="return confirm('Weet je zeker dat je deze klant wilt verwijderen?')"></a>
                                        </td>
                                    </tr>

                                    <?php endforeach; ?>
                                    <!-- Modals-->
                                    <?php
                                    /* Modal voor editen */
                                    include 'inc/dienstModals/editModal.php';
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