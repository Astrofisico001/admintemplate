=<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Clientes</title>
    </head>
    <body>
        <?php
          include '../../controllers/reservas/getReservas.php';
          require '../../clases/Cliente.php';
          $cliente = new Cliente();
          $obtenerClientes = $cliente->obtenerClientes();
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-consumo').DataTable();
                $('#table-reservas').DataTable();
                $('#table-clientes').DataTable();
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
        <?php
        //enviar mensajes
        $cont = 1;
        if ($cont = 1) {
            echo "<script>$(document).ready(function () {Materialize.toast('NUEVA RESERVA EN LA MESA 1!', 4000)}); </script>";
        } else {
            echo "<script>$(document).ready(function () {Materialize.toast('PROBLEMA EN LA MESA 2!', 10000) }); </script>";
        }
        ?>
        <div class="card">
            <?php include "header.php" ?>
            <div class="card-content grey lighten-4">
                <div class="row">
                    <?php include "colapsible.php"; ?>
                </div>
                <div id="test4">
                    <div class="row">
                        <div class="card">
                            <div class="card-content">
                                <h4>Agregar Cliente</h4>
                                <form action="../../controllers/clientes/ajaxsubmit.php" method="POST">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="nombre" type="text" name="nombre" class="validate" required>
                                            <label for="nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">phone</i>
                                            <input id="telefono" name="telefono" type="text" class="validate">
                                            <label for="telefono">Telefono (opcional)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">email</i>
                                            <input id="email" name="email" type="email" class="validate">
                                            <label for="email">Email (opcional)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </form><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="test5">
                    <div class="col m12 s12">
                        <div class="card">
                            <div class="card-content">
                              <h4>Clientes</h4>
                                <table id="table-clientes">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo Electrónico</th>
                                            <th>Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($obtenerClientes as $value) { ?>
                                        <tr>
                                          <td><?= $value["nombre_completo"]?></td>
                                          <td><?= $value["correo_electronico"]?></td>
                                          <td><?= $value["telefono"]?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
