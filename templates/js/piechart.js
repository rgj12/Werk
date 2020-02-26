prodnaam1 = $("#productnaam1").val();
prodverkocht1 = $("#aantalverkocht1").val();
prodnaam2 = $("#productnaam2").val();
prodverkocht2 = $("#aantalverkocht2").val();
prodnaam3 = $("#productnaam3").val();
prodverkocht3 = $("#aantalverkocht3").val();

Morris.Donut({
  element: "pie-chart",
  data: [
    { label: prodnaam1, value: prodverkocht1 },
    { label: prodnaam2, value: prodverkocht2 },
    { label: prodnaam2, value: prodverkocht3 }
  ]
});
