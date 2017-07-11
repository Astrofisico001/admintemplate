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
            $sql = "SELECT codigo_mesa,capacidad_litros,nombre_mesa FROM mesas";
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
            $sql = "SELECT estado FROM " . self::TABLA . " WHERE codigo_mesa=? AND estado=1";
            //preparamos la consulta para buscar el estado de la mesa
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $codigoMesa);
            $consulta->execute();
            $estado = $consulta->fetch();
            //si el estado de la mesa no es nulo retorna 1
            if ($estado != NULL)
                return true;
            else //el estado de la mesa es 0
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //obtener ranking de consumo
    public static function obtenerRankingConsumo($codigo_mesa) {
        try {
            $conexion = new Conexion();
            $sql = "";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $estado = $consulta->fectch();
            if (true) {

            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
