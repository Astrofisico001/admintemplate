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
        <link href="../../util/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>

        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../util/usuarios/getUsuarios.php';

        if (isset($_POST["nombre"])) {
            $usuario = new Usuario();
            $nombre = $_POST["nombre"];
            $correo = $_POST["email"];
            $telefono = $_POST["telefono"];
            $actualizarUsuario = $usuario->__actualizarUsuario($nombre, $correo, $telefono);
            echo "<script>alert(actualizado);</script>";
        }
        ?>  
        <script>
            $(document).ready(function () {
                $('#table-users').DataTable();
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
            <div class="col m2"></div>
            <div class="col s12 m9">

                <?php foreach ($usuarios as $row) { ?>        
                    <div class="card col m3 s12">
                        <div class="card-image">
                            <img src="../../img/3.jpg" alt=""/>
                            <span class="card-title"><?php echo $row["nombre_completo"]; ?></span>
                            <a class="btn-floating halfway-fab waves-effect">
                                <img src="<?php echo "../../" . $row["img_url_perfil"]; ?>" alt=""/>
                            </a>
                        </div>
                        <div class="card-content">
                            <p><?php echo $row["tipo_usuario"]; ?></p>
                            <p>Ultimo Ingreso: Hoy a las 19:00 pm.</p>
                            <p>
                                <?php
                                if (Usuario::retornarEstado($row["usuario_id"])) {
                                    ?> Conectado <?php
                                } else {
                                    ?>
                                    Desconectado <?php } ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div><br>
            <a class="btn-floating btn-large waves-effect darken-2"><i class="material-icons">add</i></a>
        </div>
        <div class="row">
            <div class="col m2"></div>
            <div class="col m10">
                <table id="table-users">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>               
                        <?php foreach ($usuarios as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row["nombre_completo"]; ?></td>
                                <td><?php echo $row["telefono"]; ?></td>
                                <td><?php echo $row["correo"]; ?></td>
                                <td> <a class="btn-flat waves-effect " href="#modal1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <!-- Modal Structure -->
                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <div class="row valign-wrapper">
                                                <div class="col s2">
                                                    <img src="<?php echo "../../" . $row["img_url_perfil"]; ?>" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                                </div>
                                                <div class="col s10">
                                                    <span class="black-text">
                                                        <?php echo $row["nombre_completo"]; ?><hr><br>
                                                        <?php echo $row["correo"]; ?><br>
                                                        <?php echo $row["telefono"]; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <a class="btn-flat small" href="path/to/settings" aria-label="Delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn-flat waves-effect " href="#modal2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <div id="modal2" class="modal">
                                        <div class="modal-content">
                                            <div class="row">
                                                <form method="POST" action="#" class="col s12">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input placeholder="Placeholder" id="nombre" name="nombre" type="text" value="<?php echo $row["nombre_completo"]; ?>" class="validate">
                                                            <label for="nombre">Nombre</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="telefono" name="telefono" type="text" class="validate" value="<?php echo $row["telefono"]; ?>">
                                                            <label for="telefono">Telefono</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="email" name="email" type="email" class="validate" value="<?php echo $row["correo"]; ?>">
                                                            <label for="email">Email</label>
                                                        </div>
                                                    </div>
                                                    <input class="waves-effect waves-light btn" type="submit" name="actualizar" value="Modificar"/>
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
    </body>
</html>