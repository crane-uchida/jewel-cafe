$(window).on('load', function(){

  var ctx = document.getElementById('myChart').getContext('2d');

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["05\/14","05\/13","05\/12","05\/11","05\/10","05\/07","05\/06","04\/30","04\/28","04\/27","04\/26","04\/23","04\/22","04\/21","04\/20","04\/19","04\/16","04\/15","04\/14","04\/13","04\/12","04\/09","04\/08","04\/07","04\/06","04\/05","04\/02","04\/01","03\/31","03\/30"],
      datasets: [{
        label: "インゴット(金)価格相場",
        lineTension: 0,
        data: ["7001","6970","6983","6988","6969","6919","6822","6756","6756","6750","6718","6738","6776","6721","6701","6764","6718","6638","6666","6649","6693","6716","6686","6702","6676","6691","6673","6622","6517","6576"],
        backgroundColor: [
          'rgba(255, 99, 132, .1)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
        ],
        borderWidth: 2,
        pointRadius: 1,
      }]
    },
    options: {
      responsive: true,
      scales: {
        yAxes: [{
          ticks: {
            min: 6500,
            max: 7100,
            autoSkip: true,
            maxTicksLimit: 8,
          }
        }],
        xAxes: [{
          ticks: {
            reverse: true,
            autoSkip: true,
            maxTicksLimit: 5,
            maxRotation: 0,
            minRotation: 0,
          }
        }]
      },
      tooltips: {
        callbacks: {
          title: function (ti, data){
            return ti[0].xLabel.replace('/', '月') + '日';
          },
          label: function(ti, data){
            const formatter = new Intl.NumberFormat('ja-JP');
            return formatter.format(data.datasets[0].data[ti.index]) + "円(/g)";
          }
        }
      },
      layout: {
        padding: {
          right: 20,
        }
      },
    }
  });
});
