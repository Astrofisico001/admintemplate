<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <script src="../../util/js/saludo.js" type="text/javascript"></script>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        //obtenemos la información para mostrar en gráfico
        include '../../controllers/consumos/inicio-consumos.php';
        ?>
        <script> $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#tableConsumo').DataTable();
                $('#tableCliente').DataTable();
                $('#modal1').modal();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                //   $(".button-collapse").sideNav();
                Highcharts.stockChart('container', {
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
            });
        </script>
        <!-- Header -->
        <?php include './header.php'; ?>
        <!-- End Header -->
        <!-- Content -->
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div id="content" class="col s12">
                    <div class="col m2"></div><div class="col m10 s12">
                        <div class="card">
                            <div class="card-content">
                                <div id="container"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                              <h4>Clientes</h4>
                                <table id="tableConsumo">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo Electrónico</th>
                                            <th>Consumo (Ltrs)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($clientesConsumo as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["nombre_completo"]; ?></td>
                                                <td><?php echo $row["correo_electronico"]; ?></td>
                                                <td><?php echo $row["total"]; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            </div>
    </body>
</html>
