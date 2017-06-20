<?php
require '../../clases/Reserva.php';
$reserva = new Reserva();
$reservas = $reserva->obtenerReservas();
?>
