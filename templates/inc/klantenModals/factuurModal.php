<div class="modal fade" id="factuurModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add.php" method="post">
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
                        <input type="text" name="voornaam" id="voornaam" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Achternaam</label>
                        <input type="text" class="form-control" name="achternaam" id="achternaam">
                    </div>

                    <!-- <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" name="email" disabled>
                    </div> -->


                    <div class="form-group">
                        <label>product1</label>

                        <select class="form-control producten" name="product1" id="product1">
                            <option value="" selected>Selecteer product</option>
                            <?php
                            foreach ($producten as $product) : ?>
                            <option value="<?= $product->productnaam; ?> / <?= $product->prijs; ?>">
                                <?= $product->productnaam ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>product2</label>

                        <select class="form-control producten" name="product2" id="product2">
                            <option value="" selected>Selecteer product</option>
                            <?php foreach ($producten as $product) : ?>
                            <option value="<?= $product->productnaam; ?> / <?= $product->prijs; ?>">
                                <?= $product->productnaam ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label>product3</label>
                        <select class="form-control" name="product3" id="product3">
                            <option value="" selected>Selecteer product</option>
                            <?php foreach ($producten as $product) : ?>
                            <option value="<?= $product->productnaam; ?> / <?= $product->prijs; ?>">
                                <?= $product->productnaam ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dienst1</label>
                        <select class="form-control" name="dienst1" id="dienst1">
                            <option value="" selected>Selecteer dienst</option>
                            <?php
                            foreach ($diensten as $dienst) : ?>
                            <option value="<?= $dienst->dienstnaam ?> / <?= $dienst->dienstprijs ?>">
                                <?= $dienst->dienstnaam; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dienst2</label>
                        <select class="form-control" name="dienst2" id="dienst2">
                            <option value="" selected>Selecteer dienst</option>
                            <?php
                            foreach ($diensten as $dienst) : ?>
                            <option value="<?= $dienst->dienstnaam ?> / <?= $dienst->dienstprijs ?>">
                                <?= $dienst->dienstnaam; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dienst3</label>
                        <select class="form-control" name="dienst3" id="dienst3">
                            <option value="" selected>Selecteer dienst</option>
                            <?php
                            foreach ($diensten as $dienst) : ?>
                            <option value="<?= $dienst->dienstnaam ?> / <?= $dienst->dienstprijs ?>">
                                <?= $dienst->dienstnaam; ?>
                                <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label>Betaal Opties</label>
                        <select name="betaalOpties" class="form-control" required>
                            <option value="">
                                Selecteer betaal optie
                            </option>
                            <option value="IDEAL"><b>Ideal</b></option>
                            <option value="pin">Pin</option>
                            <option value="per omgaande">Per Omgaande</option>
                            <option value="14 dagen"> 14 dagen</option>
                            <option value="contante">Contant</option>
                        </select>
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