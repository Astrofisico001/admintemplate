<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-reservas').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $('.modal').modal();
                $('.modal2').modal();
            });
        </script>
        <?php
        require '../../clases/Reserva.php';
        $reserva = new Reserva();
        $listaReservas = $reserva->obtenerReservas();
        ?>
        <!-- Header-->
        <?php include './header.php'; ?>
        <!-- End-Header -->
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div class="col m10">
                    <div class="card">
                        <div class="card-content">
                            <table id="table-reservas">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listaReservas as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["fecha_reserva"]; ?></td>
                                            <td><?php echo $row["producto"]; ?></td>
                                            <td><?php echo $row["cantidad"]; ?></td>
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
                                                <a class="btn-flat small" href="../../util/reservas/delete.php?reserva_id=<?php print $row["reserva_id"]; ?>" aria-label="Delete" onClick="javascript: return confirm('¿Confirmar Borrado de Reserva?');">
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
    </body>
</html>
