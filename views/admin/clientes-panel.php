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
                <link rel="icon" type="image/png" href="https://s-media-cache-ak0.pinimg.com/originals/9d/63/bd/9d63bd96356d4ac066ee53aa699250e9.png" />
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../util/clientes/getClientes.php';
        ?>  
        <script>
            $(document).ready(function () {
                $('#table-clientes').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $('.modal').modal();
                $('.modal2').modal();
            });
        </script>
        <!-- Header -->
        <?php include '../../util/html-admin/header.php';?>
        <!-- Content -->
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div class="col m10">
                    <table id="table-clientes">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Consumo (Ltrs)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($clientes as $row) {
                                $nombre = $row["nombre_completo"];
                                $correo = $row["correo_electronico"];
                                $total = $row["total"];
                                $telefono = $row["telefono"];
                                ?>
                                <tr>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $correo; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td> <a class="btn-flat waves-effect " href="#modal1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <!-- Modal Structure -->
                                        <div id="modal1" class="modal">
                                            <div class="modal-content">
                                                <h4>Modal Header</h4>
                                                <p>modal 1</p>
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
                                                                <input placeholder="Placeholder" id="first_name" type="text" class="validate" value="<?php echo $nombre; ?>">
                                                                <label for="first_name">Nombre</label>
                                                            </div>
                                                            <div class="input-field col s6">
                                                                <input id="last_name" type="text" class="validate" value="<?php echo $telefono; ?>">
                                                                <label for="last_name">Telefono</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="email" type="email" class="validate" value="<?php echo $correo; ?>">
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
    </body>
</html>