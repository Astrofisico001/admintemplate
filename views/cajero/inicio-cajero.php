<!DOCTYPE html>
<html>
    <head>
        <!-- Llamamos el php contenedor de scripts y links para la pagina-->
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Inicio</title>
    </head>
    <body>
        <?php
        include '../../controllers/reservas/getReservas.php';
        include '../../controllers/mesas/getConsumosService.php';
        require '../../clases/Cliente.php';
        $cliente = new Cliente();
        $obtenerClientes = $cliente->obtenerClientes();
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('.carousel').carousel();
                <?php foreach ($reservas as $row): ?>
                  $('#<?= $row["pedido_id"]?>').modal();
                <?php endforeach; ?>
                $('#table-reservas').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: 'Ranking<br>de<br>Consumo',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 40
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -50,
                                style: {
                                    fontWeight: 'bold',
                                    color: 'white'
                                }
                            },
                            startAngle: -90,
                            endAngle: 90,
                            center: ['50%', '75%']
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Browser share',
                            innerSize: '50%',
                            data: [
                                ['Mesa 1', 40.00],
                                ['Mesa 2', 60.00],
                                {
                                    name: 'Proprietary or Undetectable',
                                    y: 0.2,
                                    dataLabels: {
                                        enabled: false
                                    }
                                }
                            ]
                        }]
                });

            });
        </script>


        <script>
        $(document).ready(function () {

          //setInterval(function(){ <?php// if($reservas!=null){ echo "Materialize.toast('Reserva nueva!', 5000)";}?> }, 5000);
        });
        </script>
        <script>$(document).ready(function () {  Materialize.toast('PROBLEMA EN LA MESA 2!', 10000) }); </script>
        <div class="row">
            <div class="card">
                <?php include "header.php" ?>
                <div class="card-content grey lighten-4">
                    <div class="row">
                        <?php include "colapsible.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
