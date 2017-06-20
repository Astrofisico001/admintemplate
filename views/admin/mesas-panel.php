<html>
    <head>
        <?php include '../../util/html-generic/head-links-and-scripts.php'; ?>
        <title>Panel ADM V 1.0</title>
    </head>
    <body>
        <?php
        include "../../controllers/mesas/getMesas.php";
        ?>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('#table-users').DataTable();
                $("select").val('10'); //seleccionar valor por defecto del select
                $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
                $('select').material_select(); //inicializar el select de materialize
                $('ul.tabs').tabs('select_tab', 'tab_id');
            });
        </script>
        <?php include './header.php'; ?>
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
