<?php

if (isset($_GET["usuario"])) {
    require '../../clases/Usuario.php';
    $borrarUsuario = new Usuario();
    $usuario = $_GET["usuario"];
    $borrarUsuario->borrarUsuario($usuario);
    header("Location: http://localhost/admintemplate/views/admin/cajeros-panel.php");
}
