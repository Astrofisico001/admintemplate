<?php

if (isset($_POST["nombre_oferta"])) {
  require '../../clases/Oferta.php';
  $oferta = new Oferta();
  $producto = $_POST["nombre_oferta"];
  $precio = $_POST["precio_oferta"];
  $codigo_mesa = 1;
  $tipo_oferta = $_POST["tipo_oferta"];
  $dir_subida = '../../img/productos/';
  $fichero_subido = $dir_subida . basename($_FILES['foto_oferta']['name']);

  if (move_uploaded_file($_FILES['foto_oferta']['tmp_name'], $fichero_subido)) {
      $foto_oferta = basename($_FILES['foto_oferta']['name']);
      $insertarOferta= $oferta->insertarOferta($producto,$precio,$foto_oferta,$codigo_mesa,$tipo_oferta);
      header("Location: ../../views/admin/ofertas-panel.php");
  } else {
      echo "¡Posible ataque de subida de ficheros!\n";
  }
}
?>
