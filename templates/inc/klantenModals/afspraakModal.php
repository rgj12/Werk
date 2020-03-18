<!-- Modal voor toevoegen -->
<div class="modal fade" id="afspraakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Maak een afspraak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="af_id" id="af_id">
                    <div class="form-group">
                        <label>Voornaam</label>
                        <input type="text" class="form-control" name="af_voornaam" id="af_voornaam" disabled>
                    </div>

                    <div class="form-group">
                        <label>Achternaam</label>
                        <input type="text" class="form-control" name="af_achternaam" id="af_achternaam" disabled>
                    </div>
                    <div class="form-group">
                        <label>Met medewerker</label>

                        <select class="form-control" name="af_medewerker" id="af_medewerker">
                            <option value="" selected>Kies medewerker</option>
                            <?php foreach ($medewerkers as $medewerker): ?>
                            <option value="<?=$medewerker->username;?>"><?=$medewerker->username?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Datum</label>
                        <input type="date" class="form-control" name="af_datum">
                    </div>
                    <div class="form-group">
                        <label>Tijd</label>
                        <input type="time" class="form-control" name="af_tijd">
                    </div>
                    <div class="form-group">
                        <label>Omschrijving</label>
                        <textarea class="form-control" name="af_omschrijving" id="" cols="30" rows="10"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                    <input type="submit" class="btn btn-primary" name="maakAfspraak" value="Maak afspraak">
                </div>
            </form>
        </div>
    </div>
</div>