<?php

require '../../clases/Cliente.php';
require '../../clases/Consumo.php';
require '../../clases/ConsumoService.php';

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$cliente = new Cliente();
$cliente->agregarCliente($nombre, $telefono, $email);
$obtenerCliente = $cliente->obtenerUltimoCliente();
$cliente_id = $obtenerCliente["cliente_id"];
//agregamos el consumo
$consumo = new Consumo();
$nuevoConsumo = $consumo->generarNuevoConsumo($cliente_id);

//activamos la Mesa
$consumoService = new ConsumoService();
$ultimoConsumo = $consumo->obtenerUltimoConsumo();

$consumo_id = $ultimoConsumo["cliente_id"];
$activarMesa = $consumoService->activarMesa($consumo_id,1);

header("Location: ../../views/cajero/clientes-cajero.php");
