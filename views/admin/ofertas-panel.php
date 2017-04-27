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
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../util/ofertas/getOfertas.php';
        ?>  
        <script>
            $(document).ready(function () {
                $('#table-ofertas').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $('.modal').modal();
                $('.modal2').modal();
                
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
                <div class="col m10">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a href="#test4">Agregar Oferta</a></li>
                            <li class="tab"><a class="active" href="#test5">Ofertas</a></li>
                        </ul>
                    </div>
                    <div class="card-conten">
                        <div id="test4"><div class="col m7">
                            <div class="row">
                                <form class="col s12 m12">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">label</i>
                                            <input id="icon_prefix" type="text" class="validate">
                                            <label for="icon_prefix">Nombre de la Oferta</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">stars</i>
                                            <input id="icon_telephone" type="tel" class="validate">
                                            <label for="icon_telephone">Precio</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                       
                                        <div class="input-field col s12 m12">
                                            <select>
                                                <option value="" disabled selected>Choose your option</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                            </select>
                                            <label>Tipo de Oferta</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>Materialize Multi File Input</label>
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>Foto</span>
                                                <input type="file" multiple>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Upload multiple files">
                                            </div>
                                        </div>    
                                    </div>
                            </div>
                        </div>
                            <div class="row">
                                   <div class="input-field col s12 m12">
                                            <select>
                                                <option value="" disabled selected>Choose your option</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                            </select>
                                            <label>Mesa Asignada</label>
                                        </div>
                                <div class="input-field col s12 m6">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                            </form><br><br><br><br><br>
                        </div>
                    </div>
                    <div id="test5">
                        <div class="row">           
                            <div class="col m10">
                                <table id="table-ofertas">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Mesa Asignada</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ofertas as $row) { ?>       
                                            <tr>
                                                <td><?php print $row["producto"]; ?></td>
                                                <td><?php print $row["precio"]; ?></td>
                                                <td><?php print $row["codigo_mesa"]; ?></td>
                                                <td> <a class="btn-flat waves-effect " href="#modal1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <!-- Modal Structure -->
                                                    <div id="modal1" class="modal">
                                                        <div class="modal-content">
                                                            <h4>Modal Header</h4>
                                                            <img src="../../img/6.jpg" alt=""/>
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
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>