

<?php
require '../../clases/Cliente.php';
$clientes = Cliente::obtenerClientes();
?>
<table id="tablita">
    <tr>
        <th>Nombre</th>
        <th>Telefono</th>
    </tr>
    <?php foreach ($clientes as $row) { ?>
        <tr>
            <td><?php echo $row["nombre_completo"]; ?></td>
            <td><?php echo $row["telefono"]; ?></td>
        </tr>
    <?php } ?>
</table>
