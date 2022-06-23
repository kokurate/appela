<!-- New Chart from https://canvasjs.com/php-charts/responsive-chart/ 
The tutorial = https://www.youtube.com/watch?v=62tpwIfHb-Q
-->

<?php
 
$dataPoints_status = array(
	array("label"=> "masuk", "y"=> $masuk ),
	array("label"=> "diverifikasi", "y"=>  $diverifikasi ),
	array("label"=> "diproses", "y"=>  $diproses ),
	array("label"=> "ditolak", "y"=>  $ditolak ),
	array("label"=> "selesai", "y"=>  $selesai ),
);


 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 

    <title>Hello, world!</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
          <div class="container">
              <a class="navbar-brand" href="#">APPELA USER</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">detail pengaduan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container my-2">
            <h1>Hello, world!</h1>
            <div class="card chart-container ">
                <h4 class="justify-content-center">Total Pengaduan di Appela Puskom</h4>
                <div class="chart has-fixed-height" id="chart_all"></div>
            </div>
            <div class="row">
                <!-- Status Saat Ini -->
                <div class="card my-5 col-sm-6">
                    <div class="status" id="status" style="height: 370px; width: 100%;">
                  
                    </div>
                </div>
                <!-- Pengaduan Saat ini -->
                <div class="card my-5 col-sm-6">
                    <div class="pengaduan" id="pengaduan" style="height: 370px; width: 100%;">
                        <p>test</p>
                    </div>
                </div>


             </div> <!-- End Row-->
        </div> <!-- End Container-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    
   <!-- High Chart JS -->
   <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Highchart all pengaduan -->
    <script>
            // Radialize the colors
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        // Build the chart
        Highcharts.chart('chart_all', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Pengaduan di Appela Puskom'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                    
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                name: 'Total Pengaduan',
                data: [
                    { name: 'Jaringan', y: {{ $jaringan }} },
                    { name: 'Server', y: {{ $server }} },
                    { name: 'Sistem Informasi', y: {{ $si }} },
                    { name: 'Website Unima', y: {{ $web_unima }} },
                    { name: 'Learning Management System', y: {{ $lms }} },
                    { name: 'Ijazah', y: {{ $ijazah }} },
                    { name: 'Slip', y: {{ $slip }} },
                ]
            }]
        });
    </script>


        <!--  Script status dan pengaduan bulan --> 
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    

    <!-- Canvas js Chart Container status bulan ini-->
    <script>
        window.onload = function () {
         
        var chart = new CanvasJS.Chart("status", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Status Bulan ini"
            },
            axisY: {
                title: "Total"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints_status, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
         
        }
        </script>
  

        <!-- Highchart pengaduan  -->
        <script>
            Highcharts.chart('pengaduan', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<b>Pengaduan bulan ini</b>'
        },
        subtitle: {
            text: 'appela puskom'
        },
        xAxis: {
            categories: [
                'Jaringan',
                'Server',
                'Sistem Informasi',
                'Website Unima',
                'Learning Management System',
                'Ijazah',
                'Slip',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tujuan Pengaduan',
            data: [
               {{ $current_jaringan }},
               {{ $current_server }},
               {{ $current_si }},
               {{ $current_webunima }},
               {{ $current_lms }},
               {{ $current_ijazah }},
               {{ $current_slip }},
            ]

        },]
    });
        
    </script>
    



  </body>
</html>