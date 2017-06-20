<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <link rel="icon" type="image/png" href="../../img/logo.png"  />
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../controllers/clientes/getClientes.php';
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-clientes').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $('.modal').modal();
                $('.tooltipped').tooltip({delay: 50});
            <?php
            foreach ($clientes as $value) {
                echo "$(." . $value['cliente_id'] . ").modal();";
            }
            ?>
            });
        </script>
        <!-- Header -->
        <?php include './header.php'; ?>
        <!-- Content -->
        <div class="row">
            <div class="row s12">
                <div class="col m2"></div>
                <div class="col m10 s12">
                    <div class="card">
                        <div class="card-content">
                            <h4>Clientes</h4>
                            <table  id="table-clientes">
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
                                            <td>
                                                <a class="btn-flat waves-effect tooltipped" data-position="left" data-delay="50" data-tooltip="Ver más"  href="#<?php echo $row['nombre_completo']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <!-- Modal Structure -->
                                                <div id="<?php echo $row['nombre_completo']; ?>" class="modal">
                                                    <div class="modal-content">
                                                        <h4><?php echo $row['nombre_completo']; ?></h4>
                                                        <p>modal 1</p>
                                                    </div>
                                                </div>
                                                <a class="btn-flat small" href="../../controllers/clientes/borrar_cliente.php?cliente=<?php echo $row["cliente_id"]; ?>" aria-label="Delete" onClick="javascript: return confirm('¿Confirmar Borrado de Cliente?');">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn-flat waves-effect tooltipped" data-position="left" data-delay="50" data-tooltip="Editar" href="#<?php echo $row['cliente_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <div id="<?php echo $row['cliente_id']; ?>" class="modal">
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
            </div>
        </div>
    </body>
</html>
