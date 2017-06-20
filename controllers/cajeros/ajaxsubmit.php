<?php

if (isset($_POST["nombre"])) {
    require '../../clases/Usuario.php';
    $usuario = new Usuario();
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
    $agregarUsuario = $usuario->agregarUsuario($nombre, $correo, $telefono, $password);
    header("Location: ../../views/admin/cajeros-panel.php");
}
