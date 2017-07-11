<?php

/**
 * Description of Problema
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Problema {

    const TABLA = 'problemas';

    public function obtenerProblemasSinResolver() {

    }

    public function obtenerProblemasResueltos() {
        try {
            $conexion = new Conexion();
            $sql = "SELECT codigo_mesa, detalle,fecha FROM " . self::TABLA . " WHERE solucionado=1";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function borrarProblemas($problema) {
        try {
          $conexion = new Conexion();
          $sql = "UPDATE ".self::TABLA." estado = 0 WHERE problema_id = ?";
          $consulta->bindParam(1,$problema);
          $consulta->execute();
        } catch (Exception $e) {

        }
    }

    


}
