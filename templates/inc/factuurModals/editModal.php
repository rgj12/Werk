<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="edit.php" method="post">
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit factuur
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="factuurnummer" name="factuurnummer">
                    <div class="form-group">
                        <label>Voornaam</label>
                        <input type="text" name="editfactvoornaam" id="editfactvoornaam" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Achternaam</label>
                        <input type="text" class="form-control" name="editfactachternaam" id="editfactachternaam">
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="editfactemail" name="editfactemail">
                    </div>
                    <div class="form-group">
                        <label>straatnaam</label>
                        <input type="text" class="form-control" name="editfactstraatnaam" id="editfactstraatnaam">
                    </div>
                    <div class="form-group">
                        <label>posctcode</label>
                        <input type="text" class="form-control" name="editfactpostcode" id="editfactpostcode">
                    </div>
                    <div class="form-group">
                        <label>Woonplaats</label>
                        <input type="text" class="form-control" name="editfactwoonplaats" id="editfactwoonplaats">
                    </div>
                    <div class="form-group">
                        <label>Telefoonnummer</label>
                        <input type="text" class="form-control" name="editfacttel" id="editfacttel">
                    </div>



                    <div class="form-group">
                        <label>product1</label>

                        <select class="form-control producten" name="product1" id="product1">
                            <option value="" id="">Selecteer product</option>
                            <option value="" id="editprod1" selected></option>

                            <?php
foreach ($producten as $product): ?>
                            <option value="<?=$product->productnaam;?> / <?=$product->prijs;?>">
                                <?=$product->productnaam?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>product2</label>

                        <select class="form-control producten" name="product2" id="product2">
                            <option value="" id="">Selecteer product</option>
                            <option value="" id="editprod2" selected></option>

                            <?php foreach ($producten as $product): ?>
                            <option value="<?=$product->productnaam;?> / <?=$product->prijs;?>">
                                <?=$product->productnaam?>
                            </option>
                            <?php endforeach;?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label>product3</label>
                        <select class="form-control" name="product3" id="product3">
                            <option value="" id="">Selecteer product</option>
                            <option value="" id="editprod3" selected></option>

                            <?php foreach ($producten as $product): ?>
                            <option value="<?=$product->productnaam;?> / <?=$product->prijs;?>">
                                <?=$product->productnaam?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dienst1</label>
                        <select class="form-control" name="dienst1" id="dienst1">
                            <option value="" id="">Selecteer dienst</option>
                            <option value="" id="editdienst1" selected></option>

                            <?php
foreach ($diensten as $dienst): ?>
                            <option value="<?=$dienst->dienstnaam?> / <?=$dienst->dienstprijs?>">
                                <?=$dienst->dienstnaam;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dienst2</label>
                        <select class="form-control" name="dienst2" id="dienst2">
                            <option value="" id="">Selecteer dienst</option>
                            <option value="" id="editdienst2" selected></option>
                            <?php
foreach ($diensten as $dienst): ?>
                            <option value="<?=$dienst->dienstnaam?> / <?=$dienst->dienstprijs?>">
                                <?=$dienst->dienstnaam;?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dienst3</label>
                        <select class="form-control" name="dienst3" id="dienst3">
                            <option value="" id="">Selecteer dienst</option>
                            <option value="" id="editdienst3" selected></option>
                            <?php
foreach ($diensten as $dienst): ?>
                            <option value="<?=$dienst->dienstnaam?> / <?=$dienst->dienstprijs?>">
                                <?=$dienst->dienstnaam;?>
                                <?php endforeach;?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label>Betaal Opties</label>
                        <select name="betaalOpties" class="form-control" required>
                            <option value="" id="editbtOptie" selected>

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
                    <input type="submit" class="btn btn-primary" name="editFactuur" value="Pas aan">
                </div>
            </form>
        </div>
    </div>
</div>