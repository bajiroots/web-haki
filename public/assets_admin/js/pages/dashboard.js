$(document).ready(function() {
    
    var DrawSparkline = function() {
        $('#sparkline-chart-1').sparkline([0, 34, 43, 35, 44, 45, 56, 37, 58], {
            type: 'line',
            width: '100%',
            height: '100',
            chartRangeMax: 50,
            lineColor: '#f78387',
            fillColor: 'rgba(247, 131, 135,.2)',
            highlightLineColor: 'transparent',
            highlightSpotColor: 'transparent',
            maxSpotColor: 'transparent',
            spotColor: 'transparent',
            minSpotColor: 'transparent',
            lineWidth: 3
        });
    };

    DrawSparkline();

    var resizeChart;

    $(window).resize(function(e) {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
        }, 300);
    });
    var options = {
        series: [{
        data: [
          [1347919200000,32.57],
          [1348005600000,33.12],
          [1348092000000,34.53],
          [1348178400000,33.83],
          [1348437600000,33.41],
          [1348524000000,32.90],
          [1348610400000,32.53],
          [1348696800000,32.80],
          [1348783200000,32.44],
          [1349042400000,32.62],
          [1349128800000,32.57],
          [1349215200000,32.60],
          [1349301600000,32.68],
          [1349388000000,32.47],
          [1349647200000,32.23],
          [1349733600000,31.68],
          [1349820000000,31.51],
          [1349906400000,31.78],
          [1349992800000,31.94],
          [1350252000000,32.33],
          [1350338400000,33.24],
          [1350424800000,33.44],
          [1350511200000,33.48],
          [1350597600000,33.24],
          [1350856800000,33.49],
          [1350943200000,33.31],
          [1351029600000,33.36],
          [1351116000000,33.40],
          [1351202400000,34.01],
          [1351638000000,34.02],
          [1351724400000,34.36],
          [1351810800000,34.39],
          [1352070000000,34.24],
          [1352156400000,34.39],
          [1352242800000,33.47],
          [1352329200000,32.98],
          [1352415600000,32.90],
          [1352674800000,32.70],
          [1352761200000,32.54],
          [1352847600000,32.23],
          [1352934000000,32.64],
          [1353020400000,32.65],
          [1353279600000,32.92],
          [1353366000000,32.64],
          [1353452400000,32.84],
          [1353625200000,33.40],
          [1353884400000,33.30],
          [1353970800000,33.18],
          [1354057200000,33.88],
          [1354143600000,34.09],
          [1354230000000,34.61],
          [1354489200000,34.70],
          [1354575600000,35.30],
          [1354662000000,35.40],
          [1354748400000,35.14],
          [1354834800000,35.48],
          [1355094000000,35.75],
          [1355180400000,35.54],
          [1355266800000,35.96],
          [1355353200000,35.53],
          [1355439600000,37.56],
          [1355698800000,37.42],
          [1355785200000,37.49],
          [1355871600000,38.09],
          [1355958000000,37.87],
          [1356044400000,37.71],
          [1356303600000,37.53],
          [1356476400000,37.55],
          [1356562800000,37.30],
          [1356649200000,36.90],
          [1356908400000,37.68],
          [1357081200000,38.34],
          [1357167600000,37.75],
          [1357254000000,38.13],
          [1357513200000,37.94],
          [1357599600000,38.14],
          [1357686000000,38.66],
          [1357772400000,38.62],
          [1357858800000,38.09],
          [1358118000000,38.16],
          [1358204400000,38.15],
          [1358290800000,37.88],
          [1358377200000,37.73],
          [1358463600000,37.98],
          [1358809200000,37.95],
          [1358895600000,38.25],
          [1358982000000,38.10],
          [1359068400000,38.32],
          [1359327600000,38.24],
          [1359414000000,38.52],
          [1359500400000,37.94],
          [1359586800000,37.83],
          [1359673200000,38.34],
          [1359932400000,38.10],
          [1360018800000,38.51],
          [1360105200000,38.40],
          [1360191600000,38.07],
          [1360278000000,39.12],
          [1360537200000,38.64],
          [1360623600000,38.89],
          [1360710000000,38.81],
          [1360796400000,38.61],
          [1360882800000,38.63],
          [1361228400000,38.99],
          [1361314800000,38.77],
          [1361401200000,38.34],
          [1361487600000,38.55],
          [1361746800000,38.11],
          [1361833200000,38.59],
          [1361919600000,39.60],
        ]
      }],
        chart: {
        id: 'area-datetime',
        type: 'area',
        height: 355,
        zoom: {
          autoScaleYaxis: true
        },
        toolbar: {
            show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      markers: {
        size: 0,
        style: 'hollow'
      },
      yaxis: {
        show: false
      },
      xaxis: {
        type: 'datetime',
        min: new Date('18 Sep 2012').getTime(),
        tickAmount: 6, 
        axisBorder: {
          show: true,
          color: 'transparent'
        },
        labels: {
          style: {
            colors: 'rgba(94, 96, 110, .5)'
          }
        }
      },
      stroke: {
        curve: 'smooth',
        width: 3,
        color: '#000'
      },
      tooltip: {
        x: {
          format: 'dd MMM yyyy'
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 0,
            opacityFrom: .6,
            opacityTo: .2,
            colors: ['#5FD0A5'],
            stops: [0, 100]
        }
      },
      grid: {
        borderColor: 'rgba(94, 96, 110, .5)',
        strokeDashArray: 4
      },
      colors:['#5FD0A5'],
      legend: {
        show: true,
        position: 'top'
      }

      };

      var chart = new ApexCharts(document.querySelector("#chart-visitors"), options);
      chart.render();
    
    
      var resetCssClasses = function(activeEl) {
      var els = document.querySelectorAll('button')
      Array.prototype.forEach.call(els, function(el) {
        el.classList.remove('active')
      });
    
      activeEl.target.classList.add('active')
    }
    
    $('.blockui-transactions').click(function() { 
        $('.card-transactions').block({ 
            message: '<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>',
            timeout: 2000 
        }); 
        event.preventDefault();
    }); 

    var flotchart1 = function () {

        // We use an inline data source in the example, usually data would
        // be fetched from a server

        var data = [],
            totalPoints = 130;
        
        function getRandomData() {

            if (data.length > 0)
                data = data.slice(1);

            // Do a random walk

            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 70,
                    y = prev + Math.random() * 10 - 5;

                if (y < 0) {
                    y = 0;
                } else if (y > 55) {
                    y = 55;
                }

                data.push(y);
            }

            // Zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        var plot = $.plot("#server-load-chart", [ getRandomData() ], {
            series: {
                shadowSize: 0,
                lines: {
                  show: true,
                  fill: .1
                },
            },
            yaxis: {
                show: false
            },
            xaxis: {
                show: false
            },
            colors: ["#36A1EA"],
            legend: {
                show: false
            },
            grid: {
                color: "#e8e8e8",
                hoverable: false,
                borderWidth: 0,
                backgroundColor: 'transparent'
            }
        });

        function update() {
            plot.setData([getRandomData()]);

            plot.draw();
            setTimeout(update, 300);
        }

        update();
        
    };

    flotchart1();

});