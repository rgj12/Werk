$(document).ready(function () {
  //factuur form invullen
  $(".factBtn").click(function (e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "factuur.php",
      method: "POST",
      data: { fk_id: id },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);
        $("#id").val(data.klantnummer);
        $("#voornaam").val(data.voornaam);
        $("#achternaam").val(data.achternaam);
        $("#email").val(data.email);
        $("#straatnaam").val(data.straatnaam);
        $("#woonplaats").val(data.woonplaats);
        $("#telefoonnummer").val(data.telefoonnummer);
        $("#postcode").val(data.postcode);
      }
    });
  });

  //edit form klanten invullen
  $(".editBtn").click(function (e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { edit_id: id },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);
        $("#editid").val(data.id);
        $("#editvoornaam").val(data.voornaam);
        $("#editachternaam").val(data.achternaam);
        $("#editemail").val(data.email);
        $("#edittelefoonnummer").val(data.telefoonnummer);
        $("#editwoonplaats").val(data.woonplaats);
        $("#editstraatnaam").val(data.straatnaam);
        $("#editpostcode").val(data.postcode);
        $("#editredenbezoek").val(data.reden_bezoek);
      }
    });
  });
  //afspraak form in afspraak overzicht invullen
  $(".edit_afspr_Btn").click(function (e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { edit_afspr_id: id },
      success: function (response) {
        data = JSON.parse(response);
        $("#edit_afspraak_id").val(data.afspraak_id);
        $("#datum").val(data.datum);
        $("#tijd").val(data.tijd);
        $("#omschrijving").val(data.omschrijving);
        $("#medewerker").val(data.medewerker);
        $("#medewerker").html(data.medewerker);
      }
    });
  });

  //afspraak form invullen
  $(".afsp_btn").click(function (e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "afspraak.php",
      method: "POST",
      data: { af_id: id },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);

        $("#af_id").val(data.klantnummer);
        $("#af_voornaam").val(data.voornaam);
        $("#af_achternaam").val(data.achternaam);
      }
    });
  });

  //edit form producten invullen
  $(".edit_product_Btn").click(function (e) {
    e.preventDefault();

    id = $(this).attr("id");

    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { edit_product_id: id },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);
        $("#editid").val(data.id);
        $("#editproductnaam").val(data.productnaam);
        $("#editprijs").val(data.prijs);
      }
    });
  });

  //edit form diensten invullen
  $(".edit_dienst_Btn").click(function (e) {
    e.preventDefault();

    id = $(this).attr("id");

    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { edit_dienst_id: id },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);
        $("#editid").val(data.id);
        $("#editdienstnaam").val(data.dienstnaam);
        $("#editdienstprijs").val(data.dienstprijs);
      }
    });
  });

  //edit form facturen invullen
  $(".editfactBtn").click(function (e) {
    e.preventDefault();

    id = $(this).attr("id");
    console.log(id);
    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { edit_factuur_id: id },
      success: function (response) {
        data = JSON.parse(response);
        console.log(data);
        $("#factuurnummer").val(data[0].factuurnummer);
        $("#editfactvoornaam").val(data[0].voornaam);
        $("#editfactachternaam").val(data[0].achternaam);
        $("#editfactemail").val(data[0].email);
        $("#editfactstraatnaam").val(data[0].straatnaam);
        $("#editfactpostcode").val(data[0].postcode);
        $("#editfactwoonplaats").val(data[0].woonplaats);
        $("#editfacttel").val(data[0].telefoonnummer);

        $("#editprod1").val(data[0].product1 + "/" + data[0].product_prijs1);
        $("#editprod1").html(data[0].product1);

        $("#editprod2").val(data[0].product2 + "/" + data[0].product_prijs2);
        $("#editprod2").html(data[0].product2);

        $("#editprod3").val(data[0].product3 + "/" + data[0].product_prijs3);
        $("#editprod3").html(data[0].product3);

        $("#editdienst1").val(data[0].dienst1 + "/" + data[0].dienst_prijs1);
        $("#editdienst1").html(data[0].dienst1);

        $("#editdienst2").val(data[0].dienst2 + "/" + data[0].dienst_prijs2);
        $("#editdienst2").html(data[0].dienst2);

        $("#editdienst3").val(data[0].dienst3 + "/" + data[0].dienst_prijs3);
        $("#editdienst3").html(data[0].dienst3);

        $("#editbtOptie").val(data[0].betaalOpties);
        $("#editbtOptie").html(data[0].betaalOpties);
      }
    });
  });

  $("#datum").change(function () {
    datum = $(this).val();

    $.ajax({
      url: "afspraak.php",
      method: "POST",
      data: { bdatum: datum },
      success: function (response) {
        console.log(response);

        $("#tijd").html(response);

      }
    });

  });
});
