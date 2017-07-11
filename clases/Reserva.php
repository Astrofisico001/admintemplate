<?php

/**
 * Description of Reserva
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Reserva {

    const TABLA = 'pedidos';
    public static function obtenerReservas() {
        try {
            $conexion = new Conexion();
            //obtenemos la información que se mostrara en la vista del cajero
            $sql = "SELECT ".self::TABLA.".pedido_id, ".self::TABLA.".codigo_mesa,
            ".self::TABLA.".cantidad,".self::TABLA.".fecha_reserva,
             TIMESTAMPDIFF(MINUTE, ".self::TABLA.".fecha_reserva, now()) AS 'desde_hace',
              ".self::TABLA.".estado,ofertas.producto,ofertas.precio,ofertas.imagen_url,
              ofertas.estado FROM ".self::TABLA."
              INNER JOIN ofertas ON(".self::TABLA.".oferta_id=ofertas.oferta_id)";
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
            $sql = "DELETE FROM ".self::TABLA." WHERE pedido_id=?";
            $consulta = $conexion->prepare($sql);
            //asignamos la id de reserva
            $consulta->bindParam(1, $reserva);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getdTraceAsString();
        }
    }

    //obtenemos la cantidad de reservas para la pagina de inicio del administrador
    public static function obtenerCantidadReservas(){
      try {
        $conexion = new Conexion();
        $sql = "SELECT count(*) as cantidad FROM ".self::TABLA." WHERE estado = 1 ";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro;
      } catch (Exception $e) {

      }
    }

}
