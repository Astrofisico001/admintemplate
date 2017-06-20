<?php
//Get JSON from Automatic Api Rest
//$json = file_get_contents("../../util/api-rest/clientes.json");
//$json = json_decode($json);
?>
<?php
/*for ($i = 0; $i < count($json); $i++) {
    ?>
    <tr>
        <td><?php echo $json[$i]->nombre_completo; ?></td>
        <td><?php echo $json[$i]->correo_electronico; ?></td>
        <td><?php echo $json[$i]->telefono; ?></td>
    </tr>
<?php } */?>


<?php
    //require '../../clases/Cliente.php';
    $cliente = new Cliente();
    $obtenerClientes = $cliente->obtenerClientes();

    foreach ($obtenerClientes as $row) { ?>
      <tr>
        <td><?php $row["nombre_completo"] ?>></td>
        <td><?php $row["telefono"] ?></td>
        <td><?php $row["correo_electronico"]?></td>
      </tr>
  <?php  }
 ?>
