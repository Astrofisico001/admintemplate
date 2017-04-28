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
                <link rel="icon" type="image/png" href="https://s-media-cache-ak0.pinimg.com/originals/9d/63/bd/9d63bd96356d4ac066ee53aa699250e9.png" />
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
        <?php include '../../util/html-admin/header.php';?>
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