$(document).ready(function() {
  //factuur form invullen
  $(".factBtn").click(function(e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "factuur.php",
      method: "POST",
      data: { fk_id: id },
      success: function(response) {
        data = JSON.parse(response);
        console.log(data);
        $("#id").val(data.id);
        $("#voornaam").val(data.voornaam);
        $("#achternaam").val(data.achternaam);
        $("#email").val(data.email);
        $("#achternaam").val(data.achternaam);
      }
    });
  });

  //edit form invullen
  $(".editBtn").click(function(e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { edit_id: id },
      success: function(response) {
        data = JSON.parse(response);
        console.log(data);
        $("#editid").val(data.id);
        $("#editvoornaam").val(data.voornaam);
        $("#editachternaam").val(data.achternaam);
        $("#editemail").val(data.email);
        $("#edittelefoonnummer").val(data.telefoonnummer);
        $("#editwoonplaats").val(data.woonplaats);
      }
    });
  });

  //afspraak form invullen
  $(".afsp_btn").click(function(e) {
    e.preventDefault();
    id = $(this).attr("id");

    $.ajax({
      url: "afspraak.php",
      method: "POST",
      data: { af_id: id },
      success: function(response) {
        data = JSON.parse(response);
        $("#af_id").val(data.id);
        $("#af_voornaam").val(data.voornaam);
        $("#af_achternaam").val(data.achternaam);
      }
    });
  });

  //afspraken vcan klant ophalen
  $(".bk_afspraak").click(function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    $.ajax({
      url: "afspraak.php",
      method: "POST",
      data: { bk_afspraak_id: id },
      success: function(response) {
        data = JSON.parse(response);
        if (data == false) {
          $("#af_datum").text("Deze klant heeft geen afspraken");
        } else {
          for (i = 0; i < data.length; i++)
            $("#af_datum").append(
              "<div>Deze klant heeft een afspraak op : " +
                "<b>" +
                data[i].datum +
                "</b> om " +
                "<b>" +
                data[i].tijd +
                "</b></div>"
            );
        }
        // $("#af_tijd").val(data.tijd);
      }
    });
  });
});
