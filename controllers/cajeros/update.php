<?php

if (isset($_POST["nombre"])) {
  require '../../clases/Usuario.php';
  $cajero = new Usuario();
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $telefono = $_POST["telefono"];
  $usuario = $_POST["usuario_id"];
  $actualizarCajero = $cajero->actualizarUsuario($nombre, $correo, $telefono, $usuario);
  header("Location: ../../views/admin/cajeros-panel.php");
}

?>
