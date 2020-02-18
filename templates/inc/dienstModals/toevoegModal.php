<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voeg een dienst toe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Dienstnaam</label>
                        <input type="text" class="form-control" name="dienstnaam">
                    </div>

                    <div class="form-group">
                        <label>Prijs</label>
                        <input type="text" class="form-control" name="dienstprijs">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                    <input type="submit" class="btn btn-primary" name="maakDienst" value="Voeg toe">
                </div>
            </form>
        </div>
    </div>
</div>