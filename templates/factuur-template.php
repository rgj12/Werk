<!DOCTYPE HTML>
<HTML>

<HEAD>
    <link rel="stylesheet" href="templates/css/factuur.css">
</HEAD>

<BODY>

    <div class="noprint">
        <center><button type="button" class="btn btn-primary" onclick="print();">Printen / Opslaan</button> <a
                href="<?php echo 'mailto: klant'; ?>"><button type="button" class="btn btn-success">E-mail</button></a>
            <button onclick="window.history.back();" type="button" class="btn btn-danger">Terug</button></center>
    </div>
    <div class="book">
        <div class="page">
            <div class="logo">
                <img src="templates/img/logo.png" alt="" srcset=""><br>
                <img id="img2" src="templates/img/image002.jpg" alt="" srcset="">
            </div>
            <center>
                <h2>Factuur</h2>
            </center>

            <div class="klantgegevens">
                <?php
echo '$test' . "</br>";
echo '$test' . "</br>";
echo '$test' . "</br>";
echo "Nederland";
?>
            </div>
            <div class="bedrijfgegevens">
                <?php
echo "IT-SKILLS</br>";

echo "test</br>";
echo "test</br></br>Burghse Ring 1<br>4328LK Burgh-Haamstede<br></br>";
echo "<b>Tel:</b> &nbsp;&nbsp;/ 0111-746000</br>";
echo "<b>E-mail:</b> </br>";
echo "<b>Website:</b></br></br>";
echo "<b>IBAN:</b> </br>";
echo "<b>BIC:</b> </br>";
echo "<b>KvK:</b></br>";
echo "<b>BTW nr:</b></br>";

?>
            </div>
            <div class="algemenegegevens">
                <?php
echo "<b>Factuurnummer:</b></br>";
echo "<b>Klantnummer:</b></br>";
echo "<b>Datum:</b></br>";
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
// if (!empty($a_dienst)) {
//     echo "<tr><td>- $a_dienst</td><td>&euro;$a_dienstprijs</td><td>$a_dienstbtw%</td>";
// }
// if (!empty($a_dienst2)) {
//     echo "<tr><td>- $a_dienst2</td><td>&euro;$a_dienstprijs2</td><td>$a_dienstbtw2%</td>";
// }
// if (!empty($a_dienst3)) {
//     echo "<tr><td>- $a_dienst3</td><td>&euro;$a_dienstprijs3</td><td>$a_dienstbtw3%</td>";
// }
// if (!empty($a_dienst4)) {
//     echo "<tr><td>- $a_dienst4</td><td>&euro;$a_dienstprijs4</td><td>$a_dienstbtw4%</td>";
// }
// if (!empty($a_dienst5)) {
//     echo "<tr><td>- $a_dienst5</td><td>&euro;$a_dienstprijs5</td><td>$a_dienstbtw5%</td>";
// }
// //if(!empty($a_verf)){
// //echo "<tr><td>- $a_verf</td><td>&euro;$a_verfprijs</td><td>$a_verfbtw%</td>";
// //}
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
//}
?>
                </table>
            </div>
            <div class="totaalprijs">
                <table border="0" width="200">
                    <?php
echo "<tr><td><b>Totaal excl. BTW: </b></td><td>&euro;</td></tr>";
echo "<tr><td><b>Totaal BTW: </b></td><td>&euro;</td></tr>";
echo "<tr><td></br></td><td></td></tr>";
echo "<tr><td><b>Totaal incl. BTW: </b></td><td>&euro;</td><br><br>";

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

</BODY>

</HTML>