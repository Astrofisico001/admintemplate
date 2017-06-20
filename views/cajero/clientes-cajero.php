<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Clientes</title>
    </head>
    <body>
        <?php
          include '../../controllers/reservas/getReservas.php';
          require '../../clases/Cliente.php';
          $cliente = new Cliente();
          $obtenerClientes = $cliente->obtenerClientes();
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-consumo').DataTable();
                $('#table-reservas').DataTable();
                $('#table-clientes').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: 'Ranking<br>de<br>Consumo',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 40
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -50,
                                style: {
                                    fontWeight: 'bold',
                                    color: 'white'
                                }
                            },
                            startAngle: -90,
                            endAngle: 90,
                            center: ['50%', '75%']
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Browser share',
                            innerSize: '50%',
                            data: [
                                ['Mesa 1', 40.00],
                                ['Mesa 2', 60.00],
                                {
                                    name: 'Proprietary or Undetectable',
                                    y: 0.2,
                                    dataLabels: {
                                        enabled: false
                                    }
                                }
                            ]
                        }]
                });
            });
        </script>
        <?php
        //enviar mensajes
        $cont = 1;
        if ($cont = 1) {
            echo "<script>$(document).ready(function () {Materialize.toast('NUEVA RESERVA EN LA MESA 1!', 4000)}); </script>";
        } else {
            echo "<script>$(document).ready(function () {Materialize.toast('PROBLEMA EN LA MESA 2!', 10000) }); </script>";
        }
        ?>
        <div class="card">
            <div class="card-content orange darken-2">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class=" material-icons" style="color:#fff" >menu</i></a>
                <ul id="slide-out" class="side-nav">
                    <li><div class="userView">
                            <div class="background">
                                <img src="../../img/7.jpg">
                            </div>
                            <a href="#!user"><img class="circle" src="../../img/mi_foto.jpg"></a>
                            <a href="#!name"><span class="white-text name">Eduardo Orbenes Díaz</span></a>
                            <a href="#!email"><span class="white-text email">eduardoorbenes@gmail.com</span></a>
                        </div></li>
                    <li><a href="#!">Configurar cuenta</a></li>
                    <li><div class="divider"></div></li>
                    <li><a class="subheader">Otras Acciones</a></li>
                    <li><a class="waves-effect" href="#!">Gestionar Clientes</a></li>
                    <li><a class="waves-effect" href="inicio-cajero.php">Informaciones</a></li>
                </ul>
            </div>

            <div class="card-content grey lighten-4">
                <div class="row">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><span class="badge">2</span><i class="material-icons">turned_in_not</i>Consumo</div>
                            <div class="collapsible-body col m12 s12">
                                <div class="col m12 s12">
                                    <div id="container" class="col m6"></div>
                                    <div class="col m6">
                                        <table id="table-consumo">
                                            <thead>
                                                <tr>
                                                    <th>Mesa</th>
                                                    <th>Consumo</th>
                                                    <th>Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mesa 1</td>
                                                    <td>33 Litros</td>
                                                    <td>$45000.-</td>
                                                </tr>
                                                <tr>
                                                    <td>Mesa 1</td>
                                                    <td>33 Litros</td>
                                                    <td>$45000.-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div></div>
                        </li>
                        <li>
                            <div class="collapsible-header "><span class="new badge"><?php echo count($reservas) ?></span><i class="material-icons">view_column</i>Reservas</div>
                            <div class="collapsible-body">
                              <div class="card">
                                <div class="card-content">
                                  <table id="table-reservas">
                                      <thead>
                                          <tr>
                                              <th>Pedido</th>
                                              <th>Producto</th>
                                              <th>Cantidad</th>
                                              <th>Mesa</th>
                                              <th>Acciones</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach ($reservas as $row) { ?>
                                              <tr>
                                                  <td><?php print "hace " . $row["desde_hace"] . " minutos"; ?></td>
                                                  <td><?php print $row["producto"]; ?></td>
                                                  <td><?php print $row["estado"]; ?></td>
                                                  <td><?php print $row["codigo_mesa"]; ?></td>
                                                  <td><a class="btn-flat waves-effect" href="#modal1"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                        </li>
                        <li>
                            <div class="collapsible-header"><span class="new badge">0</span><i class="material-icons">info</i>Problemas</div>
                            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                        </li>
                    </ul>
                </div>
                <div id="test4">
                    <div class="row">
                        <div class="card">
                            <div class="card-content">
                                <h4>Agregar Cliente</h4>
                                <form action="../../controllers/clientes/ajaxsubmit.php" method="POST">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="nombre" type="text" name="nombre" class="validate" required>
                                            <label for="nombre">Nombre</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">phone</i>
                                            <input id="telefono" name="telefono" type="text" class="validate">
                                            <label for="telefono">Telefono (opcional)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">email</i>
                                            <input id="email" name="email" type="email" class="validate">
                                            <label for="email">Email (opcional)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </form><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="test5">
                    <div class="col m12 s12">
                        <div class="card">
                            <div class="card-content">
                              <h4>Clientes</h4>
                                <table id="table-clientes">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo Electrónico</th>
                                            <th>Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($obtenerClientes as $value) { ?>
                                        <tr>
                                          <td><?= $value["nombre_completo"]?></td>
                                          <td><?= $value["correo_electronico"]?></td>
                                          <td><?= $value["telefono"]?></td>
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
    </body>
</html>
