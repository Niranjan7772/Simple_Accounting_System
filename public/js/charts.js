"use strict";

// Expense Category
(function () {
  let options = {
    series: [1400.54, 1120, 850.11, 650.09],
    chart: {
      type: "donut"
    },
    legend: {
      show: false
    },
    tooltip: {
      enabled: false
    },
    dataLabels: {
      enabled: false
    },
    plotOptions: {
      pie: {
        donut: {
          size: "70%"
        }
      }
    },
    labels: ["Subscribed", "Taxs", "Taxs 2", "Others"],
    colors: ["#31B099", "#E7854D", "#C65468", "#4D81E7"]
  };
  let chart = document.querySelector("#expense-category");
  if (chart != null) {
    new ApexCharts(chart, options).render();
  }
})();

// Income Analysis
(function () {
  let options = {
    series: [{
      name: "Income Analysis",
      data: [7000, 6000, 9000, 5000]
    }],
    chart: {
      type: "bar",
      height: "100%",
      toolbar: {
        show: false
      },
      fontFamily: "Manrope, sans-serif"
    },
    plotOptions: {
      bar: {
        columnWidth: "42%"
      }
    },
    colors: ["#E7854D"],
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr"],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        style: {
          colors: "#ACB5BB"
        },
        offsetY: -2
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: "#ACB5BB",
          fontSize: "12px"
        },
        offsetX: -6,
        formatter: function (value) {
          let val = Math.abs(value);
          if (val >= 10 ** 3 && val < 10 ** 6) {
            val = (val / 1000).toFixed(0) + "k";
          } else if (val >= 10 ** 6) {
            val = (val / 1000000).toFixed(0) + "m";
          } else {
            val = val;
          }
          return val;
        }
      }
    },
    grid: {
      strokeDashArray: 0,
      borderColor: "#DCE4E8",
      padding: {
        top: -20,
        right: 0,
        bottom: -5,
        left: 0
      }
    },
    states: {
      hover: {
        filter: {
          type: "none"
        }
      }
    },
    tooltip: {
      enabled: false
    }
  };
  let chart = document.querySelector("#income-analysis");
  if (chart != null) {
    new ApexCharts(chart, options).render();
  }
})();

// Expense Analysis
(function () {
  let options = {
    series: [{
      name: "Expense Analysis",
      data: [7000, 6800, 7200, 7000, 7200]
    }],
    chart: {
      type: "area",
      height: "100%",
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    grid: {
      show: false,
      padding: {
        top: -35,
        right: 6,
        left: -3
      }
    },
    fill: {
      colors: "#4D81E7",
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.7,
        opacityTo: 0.9,
        stops: [0, 95, 100]
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: "straight",
      width: 3
    },
    markers: {
      size: 4,
      colors: "#ffffff",
      strokeWidth: 3,
      strokeColors: "#4D81E7"
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May"],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        show: false
      }
    },
    yaxis: {
      labels: {
        show: false
      }
    },
    tooltip: {
      enabled: false
    }
  };
  let chart = document.querySelector("#expense-analysis");
  if (chart != null) {
    new ApexCharts(chart, options).render();
  }
})();

// Balance Statistics
(function () {
  let options = {
    series: [{
      name: "Balance Statistics",
      data: [14200, 10040, 12200, 16400, 13800, 15000, 10400, 12750, 16700, 18200, 12450, 11500]
    }],
    chart: {
      type: "bar",
      height: "100%",
      toolbar: {
        show: false
      },
      fontFamily: "Manrope, sans-serif"
    },
    plotOptions: {
      bar: {
        columnWidth: "55%",
        borderRadius: 3
      }
    },
    colors: ["#5FCFB0"],
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Now", "Dec"],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        style: {
          colors: "#ACB5BB"
        },
        offsetY: -2
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: "#ACB5BB",
          fontSize: "12px"
        },
        offsetX: -6,
        formatter: function (value) {
          let val = Math.abs(value);
          if (val >= 10 ** 3 && val < 10 ** 6) {
            val = "$" + (val / 1000).toFixed(0) + "k";
          } else if (val >= 10 ** 6) {
            val = "$" + (val / 1000000).toFixed(0) + "m";
          } else {
            val = "$" + val;
          }
          return val;
        }
      }
    },
    grid: {
      strokeDashArray: 0,
      borderColor: "#DCE4E8",
      padding: {
        top: -20,
        right: 0,
        bottom: -10,
        left: 0
      }
    },
    states: {
      hover: {
        filter: {
          type: "darken",
          value: 0.6
        }
      }
    },
    tooltip: {
      custom: function (_ref) {
        let {
          series,
          seriesIndex,
          dataPointIndex,
          w
        } = _ref;
        return '<div class="tooltip-chart"><div class="tooltip-chart__title">Total Balance</div><div class="tooltip-chart__value">' + "<span>$" + series[seriesIndex][dataPointIndex] + "</span>" + "</div></div>";
      }
    }
  };
  let chart = document.querySelector("#balance-statistics");
  if (chart != null) {
    new ApexCharts(chart, options).render();
  }
})();

// Balance Analytics
(function () {
  var options = {
    grid: {
      strokeDashArray: "6 6",
      padding: {
        top: -20,
        right: 5,
        bottom: -10,
        left: 10
      },
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: true
        }
      }
    },
    legend: {
      show: false
    },
    colors: ["#31B099"],
    series: [{
      name: "Balance Statistics",
      data: [860000, 1332000, 822000, 1143000, 2020000, 1432000, 1200000, 1650000, 2200000, 1600000, 1230000, 1730000]
    }],
    chart: {
      height: "100%",
      type: "line",
      toolbar: {
        show: false
      },
      fontFamily: "Inter, sans-serif"
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: "straight",
      width: 5
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Now", "Dec"],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        style: {
          colors: "#ACB5BB",
          fontSize: "12px"
        },
        offsetY: -2
      }
    },
    yaxis: {
      labels: {
        style: {
          fontSize: "12px",
          colors: "#ACB5BB"
        },
        offsetX: -6,
        formatter: function (value) {
          let val = Math.abs(value);
          if (val >= 10 ** 3 && val < 10 ** 6) {
            val = "$" + (val / 1000).toFixed(0) + "k";
          } else if (val >= 10 ** 6) {
            val = "$" + (val / 1000000).toFixed(0) + "m";
          } else {
            val = "$" + val;
          }
          return val;
        }
      }
    },
    tooltip: {
      custom: function (_ref2) {
        let {
          series,
          seriesIndex,
          dataPointIndex,
          w
        } = _ref2;
        return '<div class="tooltip-chart"><div class="tooltip-chart__title">Total Income</div><div class="tooltip-chart__value">' + "<span>$" + series[seriesIndex][dataPointIndex] + "</span>" + "</div></div>";
      }
    }
  };
  var chart = document.querySelector("#balance-analytics");
  if (chart != null) {
    new ApexCharts(chart, options).render();
  }
})();