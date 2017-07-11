<?php

if (isset($_POST["username"])&&isset($_POST["password"])) {

  require '../../clases/Usuario.php';
  $usuario = new Usuario();
  if ($usuario->validarUsuario($_POST["username"], $_POST["password"])) {
    header("Location: ../../views/admin/inicio-panel.php");
  }else{
    header("Location: ../../index.php?e=1");
  }

}


?>
