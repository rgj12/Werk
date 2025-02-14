<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="edit.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pas Afspraak aan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_afspraak_id" name="editid">

                    <div class="form-group">
                        <label>Datum</label>
                        <input type="date" class="form-control" id="datum" name="datum">
                    </div>

                    <div class="form-group">
                        <label>Tijd</label>
                        <input type="text" class="form-control" name="tijd" id="tijd">
                    </div>
                    <div class="form-group">
                        <label>Omschrijving</label>
                        <textarea class="form-control" name="omschrijving" id="omschrijving" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Medewerker</label>
                        <select class="form-control" name="editmedewerker">
                            <option id="medewerker" value="" selected hidden></option>
                            <?php foreach ($medewerkers as $medewerker) : ?>
                            <option value="<?= $medewerker->username; ?>"><?= $medewerker->username; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                    <input type="submit" class="btn btn-primary" name="editAppointment" value="Pas aan">
                </div>
            </form>
        </div>
    </div>
</div>