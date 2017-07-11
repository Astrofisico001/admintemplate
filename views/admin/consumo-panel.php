<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="../../materialize/css/materialize.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <script src="../../materialize/js/jquery.js" type="text/javascript"></script>
        <script src="../../materialize/js/materialize.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <link rel="icon" type="image/png" href="https://s-media-cache-ak0.pinimg.com/originals/9d/63/bd/9d63bd96356d4ac066ee53aa699250e9.png" />
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
      ]);

      var options = {
        title: 'My Daily Activities',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
    }
  </script>
        <?php
        include '../../controllers/consumos/inicio-consumos.php';
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {

                    // Create the chart
                    Highcharts.stockChart('reserva', {
                        rangeSelector: {
                            selected: 1
                        },
                        title: {
                            text: 'Consumo Local'
                        },
                        series: [{
                                name: 'AAPL Stock Price',
                                data: [<?php echo join($data, ',') ?>],
                                marker: {
                                    enabled: true,
                                    radius: 3
                                },
                                shadow: true,
                                tooltip: {
                                    valueDecimals: 2
                                }
                            }]
                    });
                });


                Highcharts.stockChart('consumo', {
                    rangeSelector: {
                        selected: 1
                    },
                    title: {
                        text: 'Consumo de cerveza'
                    },
                    series: [{
                            name: 'Litros',
                            // Entregamos la data
                            data: [<?php echo join($data, ',') ?>],
                            tooltip: {
                                valueDecimals: 2
                            }
                        }]
                });



                Highcharts.chart('ofertas', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Browser market shares. January, 2015 to May, 2015'
                    },
                    subtitle: {
                        text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Total percent market share'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}%'
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },
                    series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: [{
                                    name: 'Microsoft Internet Explorer',
                                    y: 70.33,
                                    drilldown: 'Microsoft Internet Explorer'
                                }, {
                                    name: 'Chrome',
                                    y: 14.03,
                                    drilldown: 'Chrome'
                                }, {
                                    name: 'Firefox',
                                    y: 10.38,
                                    drilldown: 'Firefox'
                                }, {
                                    name: 'Safari',
                                    y: 4.77,
                                    drilldown: 'Safari'
                                }, {
                                    name: 'Opera',
                                    y: 0.91,
                                    drilldown: 'Opera'
                                }, {
                                    name: 'Proprietary or Undetectable',
                                    y: 0.2,
                                    drilldown: null
                                }]
                        }],
                    drilldown: {
                        series: [{
                                name: 'Microsoft Internet Explorer',
                                id: 'Microsoft Internet Explorer',
                                data: [
                                    [
                                        'v11.0',
                                        24.13
                                    ],
                                    [
                                        'v8.0',
                                        17.2
                                    ],
                                    [
                                        'v9.0',
                                        8.11
                                    ],
                                    [
                                        'v10.0',
                                        5.33
                                    ],
                                    [
                                        'v6.0',
                                        1.06
                                    ],
                                    [
                                        'v7.0',
                                        0.5
                                    ]
                                ]
                            }, {
                                name: 'Chrome',
                                id: 'Chrome',
                                data: [
                                    [
                                        'v40.0',
                                        5
                                    ],
                                    [
                                        'v41.0',
                                        4.32
                                    ],
                                    [
                                        'v42.0',
                                        3.68
                                    ],
                                    [
                                        'v39.0',
                                        2.96
                                    ],
                                    [
                                        'v36.0',
                                        2.53
                                    ],
                                    [
                                        'v43.0',
                                        1.45
                                    ],
                                    [
                                        'v31.0',
                                        1.24
                                    ],
                                    [
                                        'v35.0',
                                        0.85
                                    ],
                                    [
                                        'v38.0',
                                        0.6
                                    ],
                                    [
                                        'v32.0',
                                        0.55
                                    ],
                                    [
                                        'v37.0',
                                        0.38
                                    ],
                                    [
                                        'v33.0',
                                        0.19
                                    ],
                                    [
                                        'v34.0',
                                        0.14
                                    ],
                                    [
                                        'v30.0',
                                        0.14
                                    ]
                                ]
                            }, {
                                name: 'Firefox',
                                id: 'Firefox',
                                data: [
                                    [
                                        'v35',
                                        2.76
                                    ],
                                    [
                                        'v36',
                                        2.32
                                    ],
                                    [
                                        'v37',
                                        2.31
                                    ],
                                    [
                                        'v34',
                                        1.27
                                    ],
                                    [
                                        'v38',
                                        1.02
                                    ],
                                    [
                                        'v31',
                                        0.33
                                    ],
                                    [
                                        'v33',
                                        0.22
                                    ],
                                    [
                                        'v32',
                                        0.15
                                    ]
                                ]
                            }, {
                                name: 'Safari',
                                id: 'Safari',
                                data: [
                                    [
                                        'v8.0',
                                        2.56
                                    ],
                                    [
                                        'v7.1',
                                        0.77
                                    ],
                                    [
                                        'v5.1',
                                        0.42
                                    ],
                                    [
                                        'v5.0',
                                        0.3
                                    ],
                                    [
                                        'v6.1',
                                        0.29
                                    ],
                                    [
                                        'v7.0',
                                        0.26
                                    ],
                                    [
                                        'v6.2',
                                        0.17
                                    ]
                                ]
                            }, {
                                name: 'Opera',
                                id: 'Opera',
                                data: [
                                    [
                                        'v12.x',
                                        0.34
                                    ],
                                    [
                                        'v28',
                                        0.24
                                    ],
                                    [
                                        'v27',
                                        0.17
                                    ],
                                    [
                                        'v29',
                                        0.16
                                    ]
                                ]
                            }]
                    }
                });
            });
        </script>
        <!-- Header -->
        <?php include './header.php'; ?>
        <!-- End Header -->
        <!-- Content -->
        <div class="row">
            <div class="col m2"></div>
            <div class="col m5 s12">
                <div id="reserva"></div>
            </div>
            <div class="col m5 s12">
                <div id="consumo"></div>
            </div>
        </div>
        <div class="row">
            <br><br><br>
            <div class="row">
                <div class="col m2"></div>
                <div class="col s12 m5">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <div id="ofertas"></div>
                            </div>
                            <div class="card-action">
                                <a href="#">Ver tablas</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m5">
                    <br><br><br>
                     <div id="piechart_3d"></div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </body>
</html>
