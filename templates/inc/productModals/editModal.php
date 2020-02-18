<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="edit.php" method="POST">
                <input type="hidden" name="editid" id="editid">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pas product aan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Productnaam</label>
                        <input type="text" name="editproductnaam" id="editproductnaam" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Prijs</label>
                        <input type="text" class="form-control" name="editprijs" id="editprijs">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                    <input type="submit" class="btn btn-primary" name="editProduct" value="Pas aan">
                </div>
            </form>
        </div>
    </div>
</div>