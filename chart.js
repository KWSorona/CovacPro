// REf
// http://stackoverflow.com/questions/40061862/chart-js-update-bars-of-a-bar-chart

var canvas = document.getElementById("barChart");
var ctx = canvas.getContext('2d');
var chartType = 'bar';
var myBarChart;

// Global Options:
Chart.defaults.global.defaultFontColor = 'grey';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ["03/21", "03/22", "03/23", "03/24", "03/25"],
  datasets: [{
    label: "접종 현황",
    fill: true,
    lineTension: 0.0,
    backgroundColor: "#6EA24D",
    borderColor: "#6EA24D", // The main line color
    borderWidth: 1,
    borderCapStyle: 'square',
    pointBorderColor: "white",
    pointBackgroundColor: "green",
    pointBorderWidth: 0.5,
    pointHoverRadius: 8,
    pointHoverBackgroundColor: "yellow",
    pointHoverBorderColor: "green",
    pointHoverBorderWidth: 1,
    pointRadius: 4,
    pointHitRadius: 10,
    data: [1000, 800, 700, 550, 480],
    spanGaps: true,
  }]
};

var options = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
};

init();

function init() {
  // Chart declaration:
  myBarChart = new Chart(ctx, {
    type: chartType,
    data: data,
    options: options
  });
}

    // function addData() {
    //   myBarChart.data.labels[12] ="2017";
    //   myBarChart.data.labels[13] ="2018";
    //   myBarChart.data.datasets[0].data[12] = 500;
    //   myBarChart.data.datasets[0].data[13] = 600;
    //   myBarChart.update();
    // }
    //
    // function adjust2016() {
    //   myBarChart.data.datasets[0].data[11] = 300;
    //   myBarChart.update();
    // }
