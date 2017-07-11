<?php

if (isset($_GET["reserva_id"])) {
    require '../../clases/Reserva.php';
    $reserva = $_GET["reserva_id"];
    $reservas = new Reserva();
    $borrarReserva = $reservas->borrarReserva($reserva);
    //retornamos a la pagina inicial
    if (isset($_GET["cajero"])) {
      header("Location: ../../views/cajero/inicio-cajero.php");
    }else {
      header('Location: http://localhost/admintemplate/views/admin/reservas-panel.php');
    }
  }
