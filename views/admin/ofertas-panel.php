<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include '../../controllers/ofertas/getOfertas.php';
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-ofertas').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $('.modal').modal();
                $('.modal2').modal();
            });
        </script>
        <style media="screen">
            #btn-agregar{
                position: absolute;
                right: 30px;
                bottom: 30px;
            }
        </style>
        <?php include './header.php'; ?>
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div class="col m10">
                    <a id="btn-agregar" class="btn-floating btn-large waves-effect waves-light red" href="#modal-agregar"><i class="material-icons">add</i></a>
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


                    <!--      <div class="card-conten">
                             <div class="col m7">
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

                      </div>-->
                </div>
            </div>
        </div>
    </body>
</html>
