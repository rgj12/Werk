<?php
include 'config/init.php';
include_once 'helpers/system_helper.php';
include 'lib/calendar_functions.php';
$klanten = new Klant;

$medewerkers = $klanten->getMedewerkers();
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $mysqli = new mysqli("localhost", "root", "", "dash");
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE datum=?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['tijd'];
            }
            $stmt->close();
        }
    }
}
// $bookings[] = $timeslot;
?>
<!doctype html>
<html lang="en">

<head>
    <title>book</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php displayMessage(); ?>
        <h6 class="text-center">Maak afspraak voor datum: <?= date('F d,Y', strtotime($date)); ?></h6>
        <hr>
        <div class="row">
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts) {
            ?>

            <div class="btn-group mb-2 mr-2 ml-2">
                <?php if (in_array($ts, $bookings)) { ?>
                <button class="btn btn-danger no" data-timeslot="<?= $ts; ?>"><?= $ts; ?></button>
                <?php } else { ?>
                <button class="btn btn-success af-knop" data-toggle="modal" data-target="#afspraakModal"
                    data-timeslot="<?= $ts; ?>"><?= $ts; ?></button>
                <?php } ?>
            </div>

            <?php } ?>

        </div>
        <div class="text-center">
            <a href="calendar.php">terug</a>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="afspraakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="add.php" id="afspraak_form" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Maak een afspraak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="current_date" value="<?= $date; ?>">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" class="form-control" name="naam">
                        </div>

                        <div class="form-group">
                            <label>Achternaam</label>
                            <input type="text" class="form-control" name="achternaam">
                        </div>
                        <div class="form-group">
                            <label>Met medewerker</label>

                            <select class="form-control" name="af_medewerker" id="af_medewerker">
                                <option value="" selected>Kies medewerker</option>
                                <?php foreach ($medewerkers as $medewerker) : ?>
                                <option value="<?= $medewerker->username; ?>"><?= $medewerker->username ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="date" class="form-control" name="af_datum" id="af_datum" value="<?= $date; ?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Tijd</label>
                            <input type="text" class="form-control" name="af_tijd" id="af_tijd" readonly>
                        </div>
                        <div class="form-group">
                            <label>Omschrijving</label>
                            <textarea class="form-control" name="af_omschrijving" id="" cols="30" rows="10"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                        <input type="submit" class="btn btn-primary" name="book" value="Maak afspraak">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <script>
    //custom method zodat er alleen nummers ingevoerd worden in telefoonnummer veld
    function validatePhoneNumber(number) {
        //verwijder elke character die geen nummer is
        number = number.replace(/[^0-9]/g, '');
        $("#telefoonnummer").val(number);

        //als de input niet 10 characters is maak input veld rood anders groen
        if (!number.match(/^0[0-9]{9}$/)) {
            $("#telefoonnummer").css({
                'background': '#FFEDEF',
                'border': 'solid 1px red'
            });
            return false;
        } else {
            $("#telefoonnummer").css({
                'background': '#99FF99',
                'border': 'solid 1px green'
            });
            return true;
        }
    }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="templates/js/request_book.js"></script>
    <script src="templates/js/validate.js"></script>
</body>

</html>