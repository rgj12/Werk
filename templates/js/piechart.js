var productnamen = $(".productnaam")
  .map(function() {
    return $(this).val();
  })
  .get();

var aantalverkocht = $(".aantalverkocht")
  .map(function() {
    return $(this).val();
  })
  .get();

var dienstnamen = $(".dienstnaam")
  .map(function() {
    return $(this).val();
  })
  .get();

var aantalverkochtd = $(".aantalverkochtd")
  .map(function() {
    return $(this).val();
  })
  .get();

Morris.Donut({
  element: "pie-chart",
  data: [
    { label: productnamen[0], value: aantalverkocht[0] },
    { label: productnamen[1], value: aantalverkocht[1] },
    { label: productnamen[2], value: aantalverkocht[2] },

    { label: dienstnamen[0], value: aantalverkochtd[0] },
    { label: dienstnamen[1], value: aantalverkochtd[1] },
    { label: dienstnamen[2], value: aantalverkochtd[2] }
  ]
});
