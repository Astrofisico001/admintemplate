<?php

/**
 * Description of Reserva
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Reserva {

    const TABLA = 'reservas';

    public static function obtenerReservas() {
        try {
            $conexion = new Conexion();
            //obtenemos la información que se mostrara en la vista del cajero
            $sql = "SELECT reservas.reserva_id, reservas.codigo_mesa,reservas.cantidad,reservas.fecha_reserva, TIMESTAMPDIFF(MINUTE, reservas.fecha_reserva, now()) AS 'desde_hace', reservas.estado,ofertas.producto,ofertas.precio,ofertas.imagen_url,ofertas.estado FROM reservas INNER JOIN ofertas ON(reservas.oferta_id=ofertas.oferta_id)";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //eliminar reserva desde el panel de control
    public function borrarReserva($reserva) {
        try {
            $conexion = new Conexion();
            $sql = "DELETE FROM reservas WHERE reserva_id=?";
            $consulta = $conexion->prepare($sql);
            //asignamos la id de reserva
            $consulta->bindParam(1, $reserva);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getdTraceAsString();
        }
    }

}
