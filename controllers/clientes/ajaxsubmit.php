<?php

require '../../clases/Cliente.php';

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$cliente = new Cliente();
$cliente->agregarCliente($nombre, $telefono, $email);
header("Location: ../../views/cajero/clientes-cajero.php");
