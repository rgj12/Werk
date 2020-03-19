<div class="modal fade" id="completeApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="afspraak.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voltooi afspraak
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="complete_id" value="<?=$afspraak->afspraak_id;?>">

                    <div class="form-group">
                        <label>Datum afspraak voltooid</label>
                        <input type="date" class="form-control" id="complete_datum" name="complete_datum" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit af</button>
                    <input type="submit" class="btn btn-primary" name="completeAppointment" value="Voltooi">
                </div>
            </form>
        </div>
    </div>
</div>