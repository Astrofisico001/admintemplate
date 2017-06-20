<?php

require "../../clases/Cliente.php";
require "../../clases/Consumo.php";

$clientes = Cliente::obtenerClientes();
$clientesConsumo = Cliente::obtenerClientesMasConsumo();
$datosTablaConsumo = Consumo::obtenerConsumoMasFecha();

foreach ($datosTablaConsumo as $datito) {
    //obtenemos fecha y litros en un array
    $date = new DateTime($datito["fecha"]);
    //listamos un array con la fecha y los litros en formato UNIX
    $data[] = "[" . $date->getTimestamp() . "000," . $datito["litros"] . "]";
}
