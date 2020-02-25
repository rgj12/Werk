<!DOCTYPE HTML>
<HTML>

<HEAD>
    <link rel="stylesheet" href="templates/css/factuur.css">
</HEAD>

<BODY>
    <?php foreach ($factuurInfo as $info) : ?>
    <div class="noprint">
        <center>
            <button type="button" class="btn btn-primary" onclick="print();">Printen / Opslaan</button>
            <a href="<?php echo 'mailto:' . $info->email; ?>">
                <button type="button" class="btn btn-success">E-mail</button>
            </a>
            <button onclick="window.history.back();" type="button" class="btn btn-danger">Terug</button>
        </center>
    </div>
    <div class="book">
        <div class="page">
            <div class="logo">
                <img src="templates/img/logo.png" alt="" srcset=""><br>
                <img id="img2" src="templates/img/image002.jpg" alt="" srcset="">
            </div>
            <center>
                <h2 style="position: relative;
    top: -87px;">Factuur</h2>
            </center>

            <div class="klantgegevens">
                <?php
                    echo $info->voornaam . " " . $info->achternaam . "</br>";
                    echo $info->straatnaam . "</br>";
                    echo $info->postcode . "</br>";
                    echo "Nederland";
                    ?>
            </div>
            <div class="bedrijfgegevens">
                <?php
                    echo "IT-SKILLS</br>";
                    echo "Julianastraat 41B</br>";
                    echo "3161AJ Rhoon</br>";
                    echo "Nederland</br></br>";
                    echo "<b>Tel:</b> 010 501 32 22</br>";
                    echo "<b>E-mail:</b> info@it-skills.nl</br>";
                    echo "<b>Website:</b> www.it-skills.nl</br></br>";
                    echo "<b>IBAN:</b> NL19INGB0008032442 </br>";
                    echo "<b>BIC:</b> INGBNL2A </br>";
                    echo "<b>KvK:</b> 24490323</br>";
                    echo "<b>BTW nr:</b> NL134904710B01</br>";

                    ?>
            </div>
            <div class="algemenegegevens">
                <?php
                    echo "<b>Factuurnummer:</b> " . $info->factuurnummer . " </br>";
                    echo "<b>Klantnummer:</b> " . $info->klantnummer . " </br>";
                    echo "<b>Datum:</b> " . date_format(new DateTime($info->datum), "d-m-Y") . "</br>";
                    // echo "<b>Medewerker:</b></br>";
                    ?>
            </div>

            <div class="bedragen">
                <table border="0" width="450">
                    <tr>
                        <td><b>Omschrijving:</b></td>
                        <td><b>Prijs:</b></td>
                        <td><b>BTW:</b></td>
                        <?php
                            if ($info->product_prijs1 != "0") {
                                echo "<tr><td>- $info->product1</td><td>&euro;$info->product_prijs1 </td><td>21%</td>";
                            }

                            if ($info->product_prijs2 != "0") {
                                echo "<tr><td>- $info->product2</td><td>&euro;$info->product_prijs2 </td><td>21%</td>";
                            }
                            if ($info->product_prijs3 != "0") {
                                echo "<tr><td>- $info->product3</td><td>&euro;$info->product_prijs3 </td><td>21%</td>";
                            }
                            if ($info->dienst_prijs1 != "0") {
                                echo "<tr><td>- $info->dienst1</td><td>&euro;$info->dienst_prijs1 </td><td>21%</td>";
                            }
                            if ($info->dienst_prijs2 != "0") {
                                echo "<tr><td>- $info->dienst2</td><td>&euro;$info->dienst_prijs2 </td><td>21%</td>";
                            }
                            if ($info->dienst_prijs3 != "0") {
                                echo "<tr><td>- $info->dienst3</td><td>&euro;$info->dienst_prijs3 </td><td>21%</td>";
                            }







                            // if (!empty($a_dienst3)) {
                            //     echo "<tr><td>- $a_dienst3</td><td>&euro;$a_dienstprijs3</td><td>$a_dienstbtw3%</td>";
                            // }
                            // if (!empty($a_dienst4)) {
                            //     echo "<tr><td>- $a_dienst4</td><td>&euro;$a_dienstprijs4</td><td>$a_dienstbtw4%</td>";
                            // }
                            // if (!empty($a_dienst5)) {
                            //     echo "<tr><td>- $a_dienst5</td><td>&euro;$a_dienstprijs5</td><td>$a_dienstbtw5%</td>";
                            // }
                            //if(!empty($a_verf)){
                            //echo "<tr><td>- $a_verf</td><td>&euro;$a_verfprijs</td><td>$a_verfbtw%</td>";
                            //}
                            // if (!empty($a_product1)) {
                            //     echo "<tr><td>- $a_product1</td><td>&euro;$a_productprijs1</td><td>$a_productbtw1%</td>";
                            // }
                            // if (!empty($a_product2)) {
                            //     echo "<tr><td>- $a_product2</td><td>&euro;$a_productprijs2</td><td>$a_productbtw2%</td>";
                            // }
                            // if (!empty($a_product3)) {
                            //     echo "<tr><td>- $a_product3</td><td>&euro;$a_productprijs3</td><td>$a_productbtw3%</td>";
                            // }
                            // if (!empty($a_product4)) {
                            //     echo "<tr><td>- $a_product4</td><td>&euro;$a_productprijs4</td><td>$a_productbtw4%</td>";
                            // }
                            // if (!empty($a_product5)) {
                            //     echo "<tr><td>- $a_product5</td><td>&euro;$a_productprijs5</td><td>$a_productbtw5%</td>";
                            // }
                            ?>
                </table>
            </div>
            <div class="totaalprijs">
                <table border="0" width="200">
                    <?php
                        echo "<tr><td><b>Totaal excl. BTW: </b></td><td>&euro;" . $info->totaalExBtw . "</td></tr>";
                        echo "<tr><td><b>Totaal BTW: </b></td><td>&euro;" . $info->totaalBTW . "</td></tr>";
                        echo "<tr><td></br></td><td></td></tr>";
                        echo "<tr><td><b>Totaal incl. BTW: </b></td><td>&euro;" . $info->totaalIncBtw . "</td><br><br>";

                        ?>

            </div>

            <div class="footer">
                <?php
                    // $text = "Deze factuur is per " . $betalingsoptie . " betaling voldaan";
                    // if ($betalingsoptie == "per omgaande") {
                    //     $text = "Deze factuur graag " . $betalingsoptie . " voldoen";
                    // } elseif ($betalingsoptie == "14 dagen") {
                    //     $text = "Deze factuur graag binnen " . $betalingsoptie . " voldoen";
                    // }

                    ?>
                <center>Op deze factuur zijn onze Algemene Voorwaarden van toepassing zie
                    website.<br><br><b><?php ?></b></center>
            </div>

        </div>


    </div>

    </div>
    <?php endforeach; ?>
</BODY>

</HTML>