





var ctx2 = document.getElementById("chart-line").getContext("2d");
//  health status
var gradientStrokeHealthStatus = ctx2.createLinearGradient(0, 250, 0, 20);
gradientStrokeHealthStatus.addColorStop(1, 'rgba(208, 208, 255, 1)');
gradientStrokeHealthStatus.addColorStop(0, 'rgba(250, 250, 250, 1)'); //rgba(159, 159, 237, 1)

// CAT Quiz 
var gradientStrokeCATQuiz = ctx2.createLinearGradient(0, 250, 0, 20);
gradientStrokeCATQuiz.addColorStop(1, 'rgba(131, 183, 106, 0.4)');
gradientStrokeCATQuiz.addColorStop(0, 'rgba(118, 179, 112, 0.06)'); // borCol -  rgba(129, 226, 153, 1)

// Heart Rate 
var gradientStrokeHeartRate = ctx2.createLinearGradient(0, 250, 0, 20);
gradientStrokeHeartRate.addColorStop(1, 'rgba(218, 129, 132, 0.4)');
gradientStrokeHeartRate.addColorStop(0, 'rgba(202, 107, 110, 0)'); // borCol -  rgba(202, 107, 110, 1)

// Oxygen staturation rate
var gradientStrokeOxygenstat = ctx2.createLinearGradient(0, 250, 0, 20);
gradientStrokeOxygenstat.addColorStop(1, 'rgba(208, 251, 255, 1)');
gradientStrokeOxygenstat.addColorStop(0, 'rgba(221, 242, 244, 0)'); // borCol - rgba(71, 143, 150, 1)

// Peak Flow
var gradientStrokePeakFlow = ctx2.createLinearGradient(0, 250, 0, 20);
gradientStrokePeakFlow.addColorStop(1, 'rgba(248, 222, 189, 1)');
gradientStrokePeakFlow.addColorStop(0, 'rgba(251, 235, 214, 0)'); // borCol - rgba(243, 165, 63, 1)






new Chart(ctx2, {
  type: "line",
  data: {
    labels: daysLabels,
    datasets: [
      {
        label: "CAT Quiz",
        tension: 0.4,
        pointRadius: 0,
        borderColor: "rgba(129, 226, 153, 1)",
        borderWidth: 3,
        backgroundColor: gradientStrokeCATQuiz,
        fill: true,
        data: catQuestionnaireData,
      },
      {
        label: "Heart Rate",
        tension: 0.4,
        pointRadius: 0,
        borderColor: "rgba(202, 107, 110, 1)",
        borderWidth: 3,
        backgroundColor: gradientStrokeHeartRate,
        fill: true,
        data: heartRateData,
      },
      {
        label: "Oxygen staturation rate",
        tension: 0.4,
        pointRadius: 0,
        borderColor: "rgba(71, 143, 150, 1)",
        borderWidth: 3,
        backgroundColor: gradientStrokeOxygenstat,
        fill: true,
        data: oxygenSatData,
      },
      {
        label: "Peak Flow",
        tension: 0.4,
        pointRadius: 0,
        borderColor: "rgba(243, 165, 63, 1)",
        borderWidth: 3,
        backgroundColor: gradientStrokePeakFlow,
        fill: true,
        data: peakFlowData,
      },
      {
        label: "Health State",
        tension: 0.4,
        borderWidth: 3,
        pointRadius: 0,
        borderColor: "rgba(159, 159, 237, 1)",
        backgroundColor: gradientStrokeHealthStatus,
        fill: true,
        data: healthStatusData,
        stepped: false,
        yAxisID: 'y2',
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    layout:{
      padding:0,
    },
    plugins: {
      legend: {
        position: 'bottom',
        display: true,
        labels: {
          usePointStyle: true,
          pointStyle: 'circle',
        }
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          padding: 5,
          color: '#b2b9bf',
          font: {
            size: 11,
            family: "Montserrat",
            style: 'normal',
            lineHeight: 1
          },
        }
      },
      x: {
        grid: {
          display: false,
        },
        ticks: {
          display: true,
          padding: 5,
          color: '#b2b9bf',
          font: {
            size: 11,
            family: "Montserrat",
            style: 'normal',
            lineHeight: 1
          },
        }
      },
      y2: {
        type: 'category',
        labels: ["Good Health", "At Risk", "Danger"],
        offset: false,
        position: 'left',
        stackWeight: 1,
        grid: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          display: true,
          padding: 5,
          color: '#b2b9bf',
          font: {
            size: 11,
            family: "Montserrat",
            style: 'normal',
            lineHeight: 2
          },
        },
      },
    },
  },
});



// to dorw statistics for HPDashboard page 
function statisticsCharts() {
  var optionsForSmallCharts =
  {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          display: false,
        },
      },
      x: {
        grid: {
          display: false,
        },
        ticks: {
          display: false,
        },
      },
      y2: {
        type: 'category',
        labels: ["Good Health", "At Risk", "Danger"],
        offset: false,
        position: 'left',
        stackWeight: 1,
        grid: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          display: false,
        },
      },
    },
  };



  // drow chart line for health status in HPDashboard page
  var ctxHealthStatus = document.getElementById("chart-line-health-status").getContext("2d");
  var gradStrkHealthStatus = ctxHealthStatus.createLinearGradient(0, 250, 0, 20);
  gradStrkHealthStatus.addColorStop(1, 'rgba(208, 208, 255, 1)');
  gradStrkHealthStatus.addColorStop(0, 'rgba(250, 250, 250, 1)');
  var HealthStatusChartLine = new Chart(ctxHealthStatus, {
    type: "line",
    data: {
      labels: daysLabelsSmallCharts,
      datasets: [
        {
          label: "Health State",
          tension: 0.4,
          borderWidth: 1,
          pointRadius: 0,
          borderColor: "rgba(159, 159, 237, 1)",
          backgroundColor: gradStrkHealthStatus,
          fill: true,
          data: healthStatusDataSmallCharts,
          stepped: false,
          yAxisID: 'y2',
        },
      ]
    },
    options: optionsForSmallCharts,
  });



  // drow chart line for CAT Quiz  in HPDashboard page
  var ctxCATQuiz = document.getElementById("chart-line-cat-quiz").getContext("2d");
  var gradStrkCATQuiz = ctxCATQuiz.createLinearGradient(0, 250, 0, 20);
  gradStrkCATQuiz.addColorStop(1, 'rgba(131, 183, 106, 0.4)');
  gradStrkCATQuiz.addColorStop(0, 'rgba(118, 179, 112, 0.06)'); // borCol -  rgba(129, 226, 153, 1)
  var CATQuizChartLine = new Chart(ctxCATQuiz, {
    type: "line",
    data: {
      labels: daysLabelsSmallCharts,
      datasets: [
        {
          label: "CAT Quiz",
          tension: 0.4,
          borderWidth: 1,
          pointRadius: 0,
          borderColor: "rgba(129, 226, 153, 1)",
          backgroundColor: gradStrkCATQuiz,
          fill: true,
          data: catQuestionnaireDataSmallCharts,
          stepped: false,

        },
      ]
    },
    options: optionsForSmallCharts,
  });




  // drow chart line for Heart Rate  in HPDashboard page
  var ctxHeartRate = document.getElementById("chart-line-heart-rate").getContext("2d");
  var gradStrkHeartRate = ctxHeartRate.createLinearGradient(0, 250, 0, 20);
  gradStrkHeartRate.addColorStop(1, 'rgba(218, 129, 132, 0.4)');
  gradStrkHeartRate.addColorStop(0, 'rgba(202, 107, 110, 0)'); // borCol -  rgba(202, 107, 110, 1)
  var HeartRateChartLine = new Chart(ctxHeartRate, {
    type: "line",
    data: {
      labels: daysLabelsSmallCharts,
      datasets: [
        {
          label: "CAT Quiz",
          tension: 0.4,
          borderWidth: 1,
          pointRadius: 0,
          borderColor: "rgba(202, 107, 110, 1)",
          backgroundColor: gradStrkHeartRate,
          fill: true,
          data: heartRateDataSmallCharts,
          stepped: false,
        },
      ]
    },
    options: optionsForSmallCharts,
  });



  // drow chart line for Oxygen staturation rate  in HPDashboard page
  var ctxOxygenStat = document.getElementById("chart-line-oxygen-stat").getContext("2d");
  var gradStrkOxygenStat = ctxOxygenStat.createLinearGradient(0, 250, 0, 20);
  gradStrkOxygenStat.addColorStop(1, 'rgba(208, 251, 255, 1)');
  gradStrkOxygenStat.addColorStop(0, 'rgba(221, 242, 244, 0)'); // borCol - rgba(71, 143, 150, 1)
  var OxygenStatChartLine = new Chart(ctxOxygenStat, {
    type: "line",
    data: {
      labels: daysLabelsSmallCharts,
      datasets: [
        {
          label: "CAT Quiz",
          tension: 0.4,
          borderWidth: 1,
          pointRadius: 0,
          borderColor: "rgba(71, 143, 150, 1)",
          backgroundColor: gradStrkOxygenStat,
          fill: true,
          data: oxygenSatDataSmallCharts,
          stepped: false,
        },
      ]
    },
    options: optionsForSmallCharts,
  });



  // drow chart line for Peak Flow  in HPDashboard page
  var ctxPeakFlow = document.getElementById("chart-line-peak-flow").getContext("2d");
  var gradStrkPeakFlow = ctxPeakFlow.createLinearGradient(0, 250, 0, 20);
  gradStrkPeakFlow.addColorStop(1, 'rgba(248, 222, 189, 1)');
  gradStrkPeakFlow.addColorStop(0, 'rgba(251, 235, 214, 0)'); // borCol - rgba(243, 165, 63, 1)
  var PeakFlowChartLine = new Chart(ctxPeakFlow, {
    type: "line",
    data: {
      labels: daysLabelsSmallCharts,
      datasets: [
        {
          label: "CAT Quiz",
          tension: 0.4,
          borderWidth: 1,
          pointRadius: 0,
          borderColor: "rgba(243, 165, 63, 1)",
          backgroundColor: gradStrkPeakFlow,
          fill: true,
          data: peakFlowDataSmallCharts,
          stepped: false,
        },
      ]
    },
    options: optionsForSmallCharts,
  });
}
