<div class="modal fade" id="factuurModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Maak factuur
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Voornaam</label>
                        <input type="text" name="voornaam" id="voornaam" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Achternaam</label>
                        <input type="text" class="form-control" name="achternaam" id="achternaam" disabled>
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" name="email" disabled>
                    </div>

                    <div class="form-group">
                        <label>product</label>
                        <input type="text" class="form-control" name="telefoonnummer" id="product">
                    </div>
                    <div class="form-group">
                        <label>dienst</label>
                        <input type="text" class="form-control" name="telefoonnummer" id="dienst">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                    <input type="submit" class="btn btn-primary" name="maakFactuur" value="Maak aan">
                </div>
            </form>
        </div>
    </div>
</div>