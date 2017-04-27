<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="materialize/css/materialize.css" rel="stylesheet" type="text/css"/>
        <script src="materialize/js/jquery.js" type="text/javascript"></script>
        <script src="materialize/js/materialize.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>

        <script> $(document).ready(function () {
                $('#tableConsumo').DataTable();
                $('#tableCliente').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $(".button-collapse").sideNav();
                $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {
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
                                data: data,
                                tooltip: {
                                    valueDecimals: 2
                                }
                            }]
                    });
                });
            });

        </script>
        <?php
        require "./controllers/Cliente.php";
        $clientes = Cliente::obtenerClientes();
        ?>  
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
                                    <img src="img/3.jpg">
                                </div>
                                <a href="#!user"><img class="circle" src="img/mi_foto.jpg"></a>
                                <a href="#!name"><span class="white-text name">Eduardo Orbenes</span></a>
                                <a href="#!email"><span class="white-text email">eduardoorbenes@gmail.com</span></a>
                            </div></li>
                        <li><a href="#"><i class="material-icons">perm_media</i>Galeria</a></li>
                        <li><a href="#"><i class="material-icons">insert_chart</i>Stats</a></li>
                        <li><a href="#"><i class="material-icons">email</i>Correos</a></li>
                        <li><a href="#"><i class="material-icons">system_update_alt</i>Reportes</a></li>
                        <li><a href="#"><i class="material-icons">view_carousel</i>Ofertas</a></li>
                        <li><a href="#"><i class="material-icons">shopping_cart</i>Reservas</a></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="btn-floating  waves-effect waves-light blue-grey"><i class="material-icons">dashboard</i></a></li>
                        <li><a class="btn-floating  waves-effect waves-light blue-grey"><i class="material-icons">report_problem</i></a></li>
                        <li><div class="chip hoverable" style="height: 40px;">
                                <a class="dropdown-button grey-text text-darken-1" style="height: 40px;" href="#!" data-constrainwidth="false" data-beloworigin="true" data-activates="profileopt">Eduardo Orbenes <img style="margin-top: 4px;" src="img/mi_foto.jpg" alt="Contact Person"></a>
                              <!--<img src="img/mi_foto.jpg" alt="Contact Person">-->
                            </div></li>
                    </ul>
                </div>
            </nav>

            <ul style="width:225px; margin-top:65px;" class="side-nav fixed">
                <li><div class="userView">
                        <div class="background">
                            <img src="img/3.jpg">
                        </div>
                        <a href="#!user"><img class="circle" src="img/mi_foto.jpg"></a>
                        <a href="#!name"><span class="white-text name">Eduardo Orbenes</span></a>
                        <a href="#!email"><span class="white-text email">eduardoorbenes@gmail.com</span></a>
                    </div></li><li><a href="#"><i class="material-icons">perm_media</i>Galeria</a></li>
                <li><a href="#"><i class="material-icons">insert_chart</i>Stats</a></li>
                <li><a href="#"><i class="material-icons">email</i>Correos</a></li>
                <li><a href="#"><i class="material-icons">system_update_alt</i>Reportes</a></li>
                <li><a href="#"><i class="material-icons">view_carousel</i>Ofertas</a></li>
                <li><a href="#"><i class="material-icons">shopping_cart</i>Reservas</a></li>
            </ul>
        </header>
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div class="col m8 s12"><br>
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#test1">Home</a></li>
                        <li class="tab col s3"><a href="#test2">Estadisticas</a></li>
                        <li class="tab col s3"><a href="#test4">Clientes</a></li>
                    </ul>
                </div>
                <div id="test1" class="col s12"><div class="row"><br><br>
                        <div class="col m2"></div>
                        <div class="col s12 m3">
                            <div class="card hoverable">
                                <div class="card-image">
                                    <img width="100" src="img/2.jpg">
                                    <span class="card-title">Beer</span>
                                </div>
                                <div class="card-content">
                                    <p>Un sistema de autoservicio innovador y fácil de usar, para mejorar la calidad del servicio y la gestión de la empresa.</p>
                                </div>
                            </div>
                        </div>
                        <div clasS="col m4">
                            <h5>Ranking de consumo</h5>
                            <ul id="dropdown2" class="dropdown-content">
                                <li><a href="#!">Consumo total<span class="badge"></span></a></li>
                                <li><a href="#!">Visitas<span class="new badge"></span></a></li>
                            </ul>
                            <a class="btn dropdown-button" href="#!" data-activates="dropdown2">Filtrar por<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <table id="tableConsumo" class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Consumo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Alvin</td>
                                        <td>Eclair@gmail.com</td>
                                        <td>6.4 Lts.</td>
                                    </tr>
                                    <tr>
                                        <td>Alan</td>
                                        <td>Jellybean@gmail.com</td>
                                        <td>3.4 Lts.</td>
                                    </tr>
                                    <tr>
                                        <td>Jonathan</td>
                                        <td>Lollipop@gmail.com</td>
                                        <td>2.4 Lts.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><div class="col m2"></div>
                    <div class="row">
                        <div class="col s12 m3">
                            <div class="card">
                                <div class="card-image">
                                    <img src="img/4.jpg">
                                    <span class="card-title lime darken-1">Oferta mas pedida</span>
                                </div>
                                <div class="card-content">
                                    <p>Este producto fue pedido 7 veces esta semana.</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Ver detalles de consumo.</a>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <!-- contenido 2-->
                        </div>
                        <div class="col s12 m3">
                            <!-- contenido 3-->
                        </div>
                    </div>
                </div>
                <div id="test2" class="col s12"><br><br>
                    <div class="col m3"></div>
                    <div id="container" class="col m5 s12"></div>
                    <div class="col s12 m3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img width="100" src="img/5.png">
                                <span class="card-title light-green accent-2">Beer</span>
                            </div>
                            <div class="card-content">
                                <p class="">Las estadisticas muestran que el consumo mas alto del local se registro el dia 6 de abril y fueron 35 litros de cerveza.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="test4" class="col s12">
                    <div class="row"><br><br>
                        <div class="col m3"></div>
                        <div class="col m6"><h5>Clientes</h5>
                            <table id="tableCliente" class="responsive-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["nombre_completo"]; ?></td>
                                            <td><?php echo $row["telefono"]; ?></td>
                                            <td><?php echo $row["correo_electronico"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>