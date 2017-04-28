<?php
echo "<header class='navbar-fixed'>
            <nav class='top-nav cyan lighten-1'>
                <div class='nav-wrapper'>
                    <ul id='profileopt' class='dropdown-content'>
                        <li><a href='#!'>Mi Perfil</a></li>
                        <li><a href='#!'>Configuraciones</a></li>
                        <li><a href='#!'>Contactos</a></li>         
                        <li class='divider'></li>
                        <li><a href='#!'>Logout</a></li>           
                    </ul>
                    <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                    <ul class='side-nav' id='mobile-demo'>
                        <li><div class='userView'>
                                <div class='background'>
                                    <img src='../../img/3.jpg'>
                                </div>
                                <a href='!user'><img class='circle' src=''../../img/mi_foto.jpg'></a>
                                <a href='#!name'><span class='white-text name'>Eduardo Orbenes</span></a>
                                <a href='#!email'><span class='white-text email'>eduardoorbenes@gmail.com</span></a>
                            </div></li>
                        <li><a href='inicio-panel.php'><i class='material-icons'>reorder</i>Inicio</a></li>
                        <li><a href='cajeros-panel.php'><i class='material-icons'>account_circle</i>Cajeros</a></li>
                        <li><a href='consumo-panel.php'><i class='material-icons'>insert_chart</i>Estadisticas</a></li>
                        <li><a href='mesas-panel.php'><i class='material-icons'>view_carousel</i>Mesas</a></li>
                        <li><a href='ofertas-panel.php'><i class='material-icons'>system_update_alt</i>Ofertas</a></li>
                        <li><a href='reservas-panel.php'><i class='material-icons'>shopping_cart</i>Reservas</a></li>
                        <li><a href='clientes-panel.php'><i class='material-icons'>people</i>Clientes</a></li>
                        <li><a href='problemas-panel.php'><i class='material-icons'>email</i>Notificaciones</a></li>
                    </ul>
                    <ul class='right hide-on-med-and-down'>
                        <li><a class='btn-floating  waves-effect waves-light blue-grey'><i class='material-icons'>dashboard</i></a></li>
                        <li><a class='btn-floating  waves-effect waves-light blue-grey'><i class='material-icons'>report_problem</i></a></li>
                        <li><div class='chip hoverable' style='height: 40px;'>
                                <a class='dropdown-button grey-text text-darken-1' style='height: 40px;' href='#!' data-constrainwidth='false' data-beloworigin='true' data-activates='profileopt'>Eduardo Orbenes <img style='margin-top: 4px;' src='../../img/mi_foto.jpg' alt='Contact Person'></a>
                            </div></li>
                    </ul>
                </div>
            </nav>
            <ul style='width:225px; margin-top:65px;' class='side-nav fixed'>
                <li><div class='userView'>
                        <div class='background'>
                            <img src='../../img/3.jpg'>
                        </div>
                        <a href='#!user'><img class='circle' src='../../img/mi_foto.jpg'></a>
                        <a href='#!name'><span class='white-text name'>Eduardo Orbenes</span></a>
                        <a href='#!email'><span class='white-text email'>eduardoorbenes@gmail.com</span></a>
                    </div></li>
                <li><a href='inicio-panel.php'><i class='material-icons'>reorder</i>Inicio</a></li>
                <li><a href='cajeros-panel.php'><i class='material-icons'>account_circle</i>Cajeros</a></li>
                <li><a href='consumo-panel.php'><i class='material-icons'>insert_chart</i>Estadisticas</a></li>
                <li><a href='mesas-panel.php'><i class='material-icons'>view_carousel</i>Mesas</a></li>
                <li><a href='ofertas-panel.php'><i class='material-icons'>system_update_alt</i>Ofertas</a></li>
                <li><a href='reservas-panel.php'><i class='material-icons'>shopping_cart</i>Reservas</a></li>
                <li><a href='clientes-panel.php'><i class='material-icons'>people</i>Clientes</a></li>
                <li><a href='problemas-panel.php'><i class='material-icons'>email</i>Notificaciones</a></li>
            </ul>
        </header>";
