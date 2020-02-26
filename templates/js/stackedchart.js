januari = $("#jan").val();
februari = $("#feb").val();
maart = $("#maa").val();
april = $("#ap").val();
mei = $("#mei").val();
juni = $("#jun").val();
juli = $("#jul").val();
augustus = $("#aug").val();
september = $("#spt").val();
oktober = $("#nov").val();
november = $("#ok").val();
december = $("#dec").val();

if (januari == "") {
  januari = 0;
}
if (februari == "") {
  februari = 0;
}
if (maart == "") {
  maart = 0;
}
if (april == "") {
  april = 0;
}
if (mei == "") {
  mei = 0;
}
if (juni == "") {
  juni = 0;
}
if (juli == "") {
  juli = 0;
}
if (augustus == "") {
  augustus = 0;
}
if (september == "") {
  september = 0;
}
if (oktober == "") {
  oktober = 0;
}
if (november == "") {
  november = 0;
}
if (december == "") {
  december = 0;
}

console.log(juni);

var data = [
    {
      y: "Januari",
      a: januari,
      b: 0
    },
    {
      y: "Februari",
      a: februari,
      b: 0
    },

    {
      y: "Maart",
      a: maart,
      b: 0
    },

    {
      y: "April",
      a: april,
      b: 0
    },
    {
      y: "Mei",
      a: mei,
      b: 0
    },
    {
      y: "Juni",
      a: juni,
      b: 0
    },
    {
      y: "Juli",
      a: juli,
      b: 0
    },
    {
      y: "Augustus",
      a: augustus,
      b: 0
    },
    {
      y: "September",
      a: september,
      b: 0
    },
    {
      y: "Oktober",
      a: oktober,
      b: 0
    },
    {
      y: "November",
      a: november,
      b: 0
    },
    {
      y: "December",
      a: december,
      b: 0
    }
  ],
  config = {
    data: data,
    xkey: "y",
    ykeys: ["a", "b"],
    labels: ["Totaal inkomen", "Totaal uitgaven"],
    fillOpacity: 0.6,
    hideHover: "auto",
    behaveLikeLine: true,
    resize: true,
    pointFillColors: ["#ffffff"],
    pointStrokeColors: ["black"],
    lineColors: ["gray"]
  };

config.element = "stacked";
config.stacked = "true";
Morris.Bar(config);
