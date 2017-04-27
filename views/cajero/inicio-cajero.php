<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="../../materialize/css/materialize.css" rel="stylesheet" type="text/css"/>
        <script src="../../materialize/js/jquery.js" type="text/javascript"></script>
        <script src="../../materialize/js/materialize.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <link href="../../util/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <title>Inicio</title>
    </head>
    <body>
        <?php
        include '../../util/reservas/getReservas.php';
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('.carousel').carousel();
                $('#modal1').modal();
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
            <div class="card-content orange darken-2">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons" style="color:#fff" >menu</i></a>
                <ul id="slide-out" class="side-nav">
                    <li><div class="userView">
                            <div class="background">
                                <img src="../../img/7.jpg">
                            </div>
                            <a href="#!user"><img class="circle" src="../../img/mi_foto.jpg"></a>
                            <a href="#!name"><span class="white-text name">Eduardo Orbenes Díaz</span></a>
                            <a href="#!email"><span class="white-text email">eduardoorbenes@gmail.com</span></a>
                        </div></li>
                    <!--<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>-->
                    <li><a href="#!">Configurar cuenta</a></li>
                    <li><div class="divider"></div></li>
                    <li><a class="subheader">Otras Acciones</a></li>
                    <li><a class="waves-effect" href="clientes-cajero.php">Gestionar Clientes</a></li>
                    <li><a class="waves-effect" href="#!">Informaciones</a></li>
                </ul>
            </div>
            <div class="card-tabs col m10">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#test4">Mesas</a></li>
                    <li class="tab"><a class="active" href="#test5">Reservas</a></li>
                </ul>
            </div>
            <div class="card-content grey lighten-4">
                <div class="row">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><span class="badge">2</span><i class="material-icons">turned_in_not</i>Consumo</div>                 
                            <div class="collapsible-body col m12 s12">
                                <div class="col m12 s12">
                                    <div id="container" class="col m6"></div>
                                    <div class="col m6">
                                        <table id="tableConsumo">
                                            <thead>
                                                <tr>
                                                    <th>Mesa</th>
                                                    <th>Consumo</th>
                                                    <th>Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mesa 1</td>
                                                    <td>33 Litros</td>
                                                    <td>$45000.-</td>
                                                </tr>
                                                <tr>
                                                    <td>Mesa 1</td>
                                                    <td>33 Litros</td>
                                                    <td>$45000.-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div></div>
                        </li>
                        <li>
                            <div class="collapsible-header "><span class="new badge"><?php echo count($reservas) ?></span><i class="material-icons">view_column</i>Reservas</div>
                            <div class="collapsible-body">
                                <table id="table-reservas">
                                    <thead>
                                        <tr>
                                            <th>Pedido</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Mesa</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservas as $row) { ?>
                                            <tr>
                                                <td><?php print "hace ".$row["desde_hace"]." minutos"; ?></td>
                                                <td><?php print $row["producto"]; ?></td>
                                                <td><?php print $row["estado"]; ?></td>
                                                <td><?php print $row["codigo_mesa"]; ?></td>
                                                <td> <a class="btn-flat waves-effect " href="#modal1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <!-- Modal Structure -->
                                                    <div id="modal1" class="modal">
                                                        <div class="modal-content">
                                                            <h4>Modal Header</h4>
                                                            <p>modal 1</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                                                        </div>
                                                    </div>
                                                    <a class="btn-flat small" href="path/to/settings" aria-label="Delete">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="btn-flat waves-effect " href="#modal2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <div id="modal2" class="modal">
                                                        <div class="modal-content">
                                                            <div class="row">
                                                                <form class="col s12">
                                                                    <div class="row">
                                                                        <div class="input-field col s6">
                                                                            <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                                                                            <label for="first_name">First Name</label>
                                                                        </div>
                                                                        <div class="input-field col s6">
                                                                            <input id="last_name" type="text" class="validate">
                                                                            <label for="last_name">Last Name</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="password" type="password" class="validate">
                                                                            <label for="password">Password</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="email" type="email" class="validate">
                                                                            <label for="email">Email</label>
                                                                        </div>
                                                                    </div>
                                                                    <a class="waves-effect waves-light btn">Modificar</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><span class="new badge">0</span><i class="material-icons">info</i>Problemas</div>
                            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                        </li>
                    </ul>
                </div>
                <div id="test4">
                    <div class="carousel">
                        <style>.carousel .carousel-item {
                                width:400px !important; height: 260px !important;} .carousel .carousel-item img{width: 300px; height: 300px;}</style>
                        <a class="carousel-item" href="#one!"><img src="../../img/mesa1.jpg" alt=""/><br>Mesa 1 </a>
                        <a class="carousel-item" href="#two!"><img src="../../img/mesa2.jpg" alt=""/><br>Mesa 2</a>
                        <a class="carousel-item" href="#three!"><img src="../../img/mesa3.jpg" alt=""/><br>Mesa 3</a>
                        <a class="carousel-item" href="#four!"><img src="../../img/mesa4.jpg" alt=""/><br>Mesa 4</a>
                        <a class="carousel-item" href="#five!"><img src="../../img/mesa1.jpg" alt=""/><br>Mesa 5</a>
                    </div>
                    <br><br><br>
                </div>
                <div id="test5">
                    <div class="row">
                        <?php foreach ($reservas as $row) { ?>
                            <div class="col s12 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="col s12 m12" src="../..<?php echo $row["imagen_url"]; ?>" alt=""/>
                                        <h3><?php $row["producto"]; ?></h3>
                                    </div>
                                    <div class="card-content">
                                        <p><?php echo $row["producto"]; ?></p>
                                        <hr>
                                        <p>Cantidad: <?php echo $row["cantidad"]; ?></p>
                                        <p>Mesa: <?php echo $row["codigo_mesa"]; ?></p>
                                        <p>Pedido desde hace : <?php echo $row["desde_hace"] . " Minutos"; ?></p>
                                        <p>Precio: <?php echo "$" . $row["precio"] . ".-"; ?></p>
                                        <p>Estado: <?php if ($row["estado"]) { ?> Pendiente
                                            <?php } else { ?>Atendido<?php } ?></p>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">Atender Reserva</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
