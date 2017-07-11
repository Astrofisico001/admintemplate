<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        //obtenemos los objetos que contienen usuarios-cajeros
        include '../../controllers/usuarios/getUsuarios.php';
        ?>
        <script type="text/javascript">
        $(document).ready(function () {
            $(".button-collapse").sideNav();
            $('#table-users').DataTable();
            $("select").val('10'); //seleccionar valor por defecto del select
            $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
            $('select').material_select(); //inicializar el select de materialize
            $('ul.tabs').tabs('select_tab', 'tab_id');
            $('.modal').modal();
            <?php
              //iniciamos el modal de view
              foreach ($cajeros as $value) {
                  echo "$(." . $value['usuario_id'] . ").modal();";
                  echo "$(." . $value['telefono'] . ").modal();";
              }
      
            ?>
            $('#modal-agregar').modal();
        });
        </script>
        <!-- Header -->
        <?php include './header.php'; ?>
        <!-- Content -->
        <style media="screen">
            #btn-agregar{
                position: relative;
                right: 30px;
                bottom: 30px;
            }

            #btn-agregar{
                position: fixed;
                right: 30px;
                bottom: 30px;
            }
        </style>
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
            <div id="modal-add" class="modal">
                <?php include '../../controllers/cajeros/add_cajeros.php'; ?>
            </div>
        </div>
        <div class="row">
            <div class="col m2"></div>
            <div class="col m10">
                <a id="btn-agregar" class="btn-floating btn-large waves-effect waves-light red" href="#modal-agregar"><i class="material-icons">add</i></a>
                <!-- Modal Structure -->
                <div id="modal-agregar" class="modal">
                    <div class="modal-content">
                        <div class="row">
                            <form action="../../controllers/cajeros/ajaxsubmit.php" method="post"class="col s12">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Nombre" id="nombre" name="nombre" type="text" class="validate" required>
                                        <label for="nombre">Nombre Completo</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="telefono" name="telefono" type="text" class="validate" required>
                                        <label for="telefono">Numero de telefono</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="correo" type="email" name="correo" class="validate" required>
                                        <label for="correo">Email</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="password" name="password" type="password" class="validate" required>
                                        <label for="password">Password de Sistema</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input class="btn" type="submit" name="submit" value="Enviar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <h4>Cajeros</h4>
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
                                <?php foreach ($cajeros as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row["nombre_completo"] ?></td>
                                        <td><?= $row["telefono"] ?></td>
                                        <td><?= $row["correo"] ?></td>
                                        <td> <a class="btn-flat waves-effect " href="#<?= $row["usuario_id"] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <!-- Modal Structure -->
                                            <div id="<?= $row["usuario_id"] ?>" class="modal">
                                                <div class="modal-content">
                                                    <div class="row valign-wrapper">
                                                        <div class="col s2">
                                                          <?php
                                                                if (!($row["img_url_perfil"] == "")) { ?>
                                                                  <img src="<?= "../../img" . $row["img_url_perfil"] ?>" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                                          <?php }else{ ?>
                                                            <img src="../../img/logo.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                                      <?php  }   ?>
                                                                </div>
                                                        <div class="col s10">
                                                            <span class="black-text">
                                                                <?= $row["nombre_completo"] ?><hr><br>
                                                                <?= $row["correo"] ?><br>
                                                                <?= $row["telefono"] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn-flat small" href="../../controllers/cajeros/delete_cajeros.php?usuario=<?php echo $row["usuario_id"]; ?>" aria-label="Delete" onClick="javascript: return confirm('¿Confirmar Borrado de Cajero?');">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn-flat waves-effect " href="#<?= $row["telefono"] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <div id="<?= $row["telefono"] ?>" class="modal">
                                                <div class="modal-content">
                                                    <div class="row">
                                                        <form action="../../controllers/cajeros/update.php" method="POST" action="#" class="col s12">
                                                            <div class="row">
                                                                <div class="input-field col s6">
                                                                    <input placeholder="Placeholder" id="nombre" name="nombre" type="text" value="<?= $row["nombre_completo"]; ?>" class="validate">
                                                                    <label for="nombre">Nombre</label>
                                                                </div>
                                                                <div class="input-field col s6">
                                                                    <input id="telefono" name="telefono" type="text" class="validate" value="<?= $row["telefono"]; ?>">
                                                                    <label for="telefono">Telefono</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="input-field col s12">
                                                                    <input id="correo" name="correo" type="email" class="validate" value="<?= $row["correo"]; ?>">
                                                                    <label for="correo">Email</label>
                                                                    <input id="usuario_id" name="usuario_id" type="hidden" class="validate" value="<?= $row["usuario_id"]; ?>">
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
            </div>
        </div>
    </body>
</html>
