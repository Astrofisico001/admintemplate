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
        ?>  
        <script>
            $(document).ready(function () {
                $('#table-users').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
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
            <div class="row"><br>
                <div class="col m2"></div>
                <div class="card col m3">
                    
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../../img/2.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Mesa 1<i class="material-icons right">more_vert</i></span>
                        <p>Disponible</p>
                        <p><a href="#">Ver Información</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>