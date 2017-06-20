<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        require '../../clases/Problema.php';
        $problema = new Problema();
        $problemas = $problema->obtenerProblemasResueltos();
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-problemas').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
            });
        </script>
        <?php include './header.php'; ?>
        <div class="row">
            <div class="row">
                <div class="col m2"></div>
                <div class="row">
                    <div id="content" class="col s12"><br>
                        <div class="col m2"></div><div class="col m10 s12">

                            <div class="card">
                                <div class="card-content">
                                    <table id="table-problemas">
                                        <h5 class="center">Problemas Resueltos</h5>
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Mesa</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($problemas as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["fecha"]; ?></td>
                                                    <td><?php echo $row["codigo_mesa"]; ?></td>
                                                    <td><?php echo $row["detalle"]; ?></td>
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
