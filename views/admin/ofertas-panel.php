<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../controllers/ofertas/getOfertas.php';

        require '../../clases/Mesa.php';
        $mesa = new Mesa();
        $obtenerMesas = $mesa->obtenerMesas();

        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-ofertas').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
              //  $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $('.modal').modal();
                $('.modal2').modal();
                <?php foreach ($listaOfertas as $row) {?>
                     $('#<?= $row['producto'] ?>').modal();
                     $('#<?= $row['oferta_id'] ?>').modal();
                <?php  }?>

                $("#modal-agregar").modal();
            });
        </script>
        <style media="screen">
            #btn-agregar{
                position: fixed;
                right: 30px;
                bottom: 30px;
            }
            ::-webkit-scrollbar {
            width: 12px;
            }

            ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
            }

        </style>
        <?php include './header.php'; ?>
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div class="col m10">
                    <a id="btn-agregar" class="btn-floating btn-large waves-effect waves-light red" href="#modal-agregar"><i class="material-icons">add</i></a>
                    <div id="modal-agregar" class="modal">
                      <div class="col m12">
                               <div class="row"><br>
                                 <img src="../../img/logo.png" width="100" height="100" alt=""><br>
                                   <form action="../../controllers/ofertas/insert.php" method="post" enctype="multipart/form-data" class="col s12 m12">
                                       <div class="row">
                                           <div class="input-field col s12 m6">
                                               <i class="material-icons prefix">label</i>
                                               <input id="nombre_oferta" name="nombre_oferta" type="text" class="validate">
                                               <label for="nombre_oferta">Nombre de la Oferta</label>
                                           </div>
                                           <div class="input-field col s12 m6">
                                               <i class="material-icons prefix">stars</i>
                                               <input id="precio_oferta" name="precio_oferta" type="tel" class="validate">
                                               <label for="precio_oferta">Precio</label>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="input-field col s12 m12">
                                               <select name="tipo_oferta">
                                                   <option value="" disabled selected>Sleccione el tipo de oferta</option>
                                               <?php
                                                   foreach ($tiposOfertas as $row) { ?>
                                                      <option value="<?= $row["tipo_ofertas_id"] ?>"><?= $row["tipo_oferta"] ?></option>
                                              <?php }  ?>
                                               </select>
                                               <label>Tipo de Oferta</label>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <label>Materialize Multi File Input</label>
                                           <div class="file-field input-field">
                                               <div class="btn">
                                                   <span>Foto</span>
                                                   <input type="file" name="foto_oferta" multiple>
                                               </div>
                                               <div class="file-path-wrapper">
                                                   <input class="file-path validate" name="foto_oferta" type="text" placeholder="Upload multiple files">
                                               </div>
                                           </div>
                                       </div>
                               </div>
                           </div>
                           <div class="row">

                               <div class="input-field col s12 m6">
                                   <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                       <i class="material-icons right">send</i>
                                   </button>
                               </div>
                           </div>
                        </form>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-content">
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
                                    <?php foreach ($listaOfertas as $row) { ?>
                                        <tr>
                                            <td><?= $row["producto"]; ?></td>
                                            <td><?= $row["precio"]; ?></td>
                                            <td><?= $row["codigo_mesa"]; ?></td>
                                            <td> <a class="btn-flat waves-effect " href="#<?= $row["producto"] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <!-- Modal Structure -->
                                                <div id="<?= $row["producto"] ?>" class="modal">
                                                    <div class="modal-content">
                                                        <h4><?= $row["producto"] ?></h4>
                                                        <div class="col m4">
                                                          <img width="200" height="200" src="../../img/productos/<?= $row["imagen_url"] ?>" alt=""/><br><br>
                                                        </div>
                                                        <div class="col m8">
                                                          <p>Detalle:</p>
                                                          <p><?= $row["detalle"] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn-flat small" href="../../controllers/ofertas/delete.php?oferta=<?= $row["oferta_id"] ?>" aria-label="Delete"  onClick="javascript: return confirm('¿Confirmar Borrado de Cliente?');">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn-flat waves-effect " href="#<?= $row['oferta_id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <div id="<?= $row['oferta_id'] ?>" class="modal">
                                                    <div class="modal-content">
                                                        <div class="row">
                                                            <form class="col s12">
                                                                <div class="row">
                                                                    <div class="input-field col s6">
                                                                        <input placeholder="Placeholder" id="producto" name="producto" type="text" value="<?= $row["producto"] ?>" class="validate">
                                                                        <label for="producto">Producto</label>
                                                                    </div>
                                                                    <div class="input-field col s6">
                                                                        <input id="Precio" type="text" name="precio" value="<?= $row["precio"]; ?>" class="validate">
                                                                        <label for="Precio">Precio</label>
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
