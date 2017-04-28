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
        <link rel="icon" type="image/png" href="https://s-media-cache-ak0.pinimg.com/originals/9d/63/bd/9d63bd96356d4ac066ee53aa699250e9.png" />
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include "../../util/Mesas/getMesas.php";
        ?>  
        <script>
            $(document).ready(function () {
                $('#table-users').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
            });
        </script>
        <?php include '../../util/html-admin/header.php'; ?>
        <div class="row">
            <div class="row"><br>
                <div class="col m2"></div>
                <?php foreach ($mesas as $row) { ?>
                    <div class="card col m3">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?php echo "../.." . $row["img_url"]; ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Mesa <?php echo $row["codigo_mesa"]; ?><i class="material-icons right">more_vert</i></span>
                            <p><?php if (Mesa::obtenerEstadoMesa($row["codigo_mesa"])) { ?>
                                    Disponible
                                <?php } else { ?>
                                    No Disponible
                                <?php }
                                ?></p>
                            <p><a href="#">Ver Información</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>