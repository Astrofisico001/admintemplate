<?php

/**
 * Description of Mesa
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Mesa {

    const TABLA = 'mesas';

    //obtener mesas instaladas
    public static function obtenerMesas() {
        try {
            //preparamos la conexion
            $conexion = new Conexion();
            $sql = "SELECT codigo_mesa,capacidad_litros,img_url FROM " . self::TABLA . "";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            //retornamos el listado de mesas
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //obtener estado de las mesas (Disponible - No Disponible)
    public static function obtenerEstadoMesa($codigoMesa) {
        try {
            //preparamos la conexion
            $conexion = new Conexion();
            //llamamos el estado donde el codigo de la mesa sea correspondiente a la lista y el estado sea disponible
            $sql = "SELECT estado FROM " . self::TABLA . " WHERE codigo_mesa='$codigoMesa' AND estado=1";
            //preparamos la consulta para buscar el estado de la mesa
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $estado = $consulta->fetch();
            if ($estado != NULL)
                return true;
            else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
