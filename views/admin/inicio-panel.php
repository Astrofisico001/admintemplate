<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="../../materialize/css/materialize.css" rel="stylesheet" type="text/css"/>
        <script src="../../materialize/js/jquery.js" type="text/javascript"></script>
        <script src="../../materialize/js/materialize.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../util/consumos/inicio-consumos.php';
        ?>  
        <script> $(document).ready(function () {
                $('#tableConsumo').DataTable();
                $('#tableCliente').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $(".button-collapse").sideNav();
                // $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {
                // Create the chart
                Highcharts.stockChart('container', {
                    rangeSelector: {
                        selected: 1
                    },
                    title: {
                        text: 'Consumo de cerveza'
                    },
                    series: [{
                            name: 'Litros',
                            data: [<?php echo join($data, ',') ?>],
                            tooltip: {
                                valueDecimals: 2
                            }
                        }]
                });
                // });
            });

        </script>
        <header class="navbar-fixed">
            <nav class="top-nav cyan lighten-1">
                <div class="nav-wrapper">
                    <ul id="profileopt" class="dropdown-content">
                        <li><a href="#!">Mi Perfil</a></li>
                        <li><a href="#!">Configuraciones</a></li>
                        <li><a href="#!">Contactos</a></li>         
                        <li class="divider"></li>
                        <li><a href="#!">Logout</a></li>           
                    </ul>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="side-nav" id="mobile-demo">
                        <li><div class="userView">
                                <div class="background">
                                    <img src="../../img/3.jpg">
                                </div>
                                <a href="#!user"><img class="circle" src="../../img/mi_foto.jpg"></a>
                                <a href="#!name"><span class="white-text name">Eduardo Orbenes</span></a>
                                <a href="#!email"><span class="white-text email">eduardoorbenes@gmail.com</span></a>
                            </div></li>
                        <li><a href="inicio-panel.php"><i class="material-icons">reorder</i>Inicio</a></li>
                        <li><a href="cajeros-panel.php"><i class="material-icons">account_circle</i>Cajeros</a></li>
                        <li><a href="consumo-panel.php"><i class="material-icons">insert_chart</i>Estadisticas</a></li>
                        <li><a href="mesas-panel.php"><i class="material-icons">view_carousel</i>Mesas</a></li>
                        <li><a href="ofertas-panel.php"><i class="material-icons">system_update_alt</i>Ofertas</a></li>
                        <li><a href="reservas-panel.php"><i class="material-icons">shopping_cart</i>Reservas</a></li>
                        <li><a href="clientes-panel.php"><i class="material-icons">people</i>Clientes</a></li>
                        <li><a href="problemas-panel.php"><i class="material-icons">email</i>Notificaciones</a></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="btn-floating  waves-effect waves-light blue-grey"><i class="material-icons">dashboard</i></a></li>
                        <li><a class="btn-floating  waves-effect waves-light blue-grey"><i class="material-icons">report_problem</i></a></li>
                        <li><div class="chip hoverable" style="height: 40px;">
                                <a class="dropdown-button grey-text text-darken-1" style="height: 40px;" href="#!" data-constrainwidth="false" data-beloworigin="true" data-activates="profileopt">Eduardo Orbenes <img style="margin-top: 4px;" src="../../img/mi_foto.jpg" alt="Contact Person"></a>
                            </div></li>
                    </ul>
                </div>
            </nav>
            <ul style="width:225px; margin-top:65px;" class="side-nav fixed">
                <li><div class="userView">
                        <div class="background">
                            <img src="../../img/3.jpg">
                        </div>
                        <a href="#!user"><img class="circle" src="../../img/mi_foto.jpg"></a>
                        <a href="#!name"><span class="white-text name">Eduardo Orbenes</span></a>
                        <a href="#!email"><span class="white-text email">eduardoorbenes@gmail.com</span></a>
                    </div></li>
                <li><a href="inicio-panel.php"><i class="material-icons">reorder</i>Inicio</a></li>
                <li><a href="cajeros-panel.php"><i class="material-icons">account_circle</i>Cajeros</a></li>
                <li><a href="consumo-panel.php"><i class="material-icons">insert_chart</i>Estadisticas</a></li>
                <li><a href="mesas-panel.php"><i class="material-icons">view_carousel</i>Mesas</a></li>
                <li><a href="ofertas-panel.php"><i class="material-icons">system_update_alt</i>Ofertas</a></li>
                <li><a href="reservas-panel.php"><i class="material-icons">shopping_cart</i>Reservas</a></li>
                <li><a href="clientes-panel.php"><i class="material-icons">people</i>Clientes</a></li>
                <li><a href="problemas-panel.php"><i class="material-icons">email</i>Notificaciones</a></li>
            </ul>
        </header>
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
              <!--  <div class="col m8 s12"><br>
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#test1">Home</a></li>
                        <li class="tab col s3"><a href="#test2">Estadisticas</a></li>
                        <li class="tab col s3"><a href="#test4">Clientes</a></li>
                    </ul>
                </div> -->
                <div id="test1" class="col s12"><br>
                    <div class="col m2"></div><div class="col m10 s12">

                        <div id="container"></div>
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
    </body>
</html>