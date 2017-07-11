<?php

/**
 * Description of Consumo
 *
 * @author Eduardo
 */

require_once '../../conexion/Conexion.php';

class Consumo {

    const TABLA = 'consumos';

    //generamos un nuevo consumo
    public function generarNuevoConsumo($cliente){
      try {
        $conexion = new Conexion();
        $sql = "INSERT INTO ".self::TABLA." (cliente_id,codigo_mesa) VALUES(?,1)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1,$cliente);
        $consulta->execute();
      } catch (Exception $e) {
      }
    }

    public function obtenerUltimoConsumo(){
      try {
        $conexion = new Conexion();
        $sql = "SELECT consumo_id FROM ".self::TABLA." ORDER BY consumo_id desc";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro;
      } catch (Exception $e) {
      }
    }


    //obtener consumo total
    public static function obtenerConsumoTotal() {
        $conexion = new Conexion();
        $sql = "SELECT sum(litros) FROM " . self::TABLA . "";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public static function obtenerConsumoMasFecha() {
        $conexion = new Conexion();
        $sql = "SELECT fecha,litros FROM " . self::TABLA . " ORDER BY fecha asc";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function asignarLitrosConsumo($litros,$consumo){

      try {
        $conexion = new Conexion();
        $sql = "UPDATE ".self::TABLA." set litros = ? WHERE consumo_id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1,$litros);
        $consulta->bindParam(2,$consumo);
        $consulta->execute();
      } catch (Exception $e) {

      }
    }


    //obtener consumo por tiempo
    //obtener información de consumo por mesa
}
