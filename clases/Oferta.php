<?php

/**
 * Description of Oferta
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Oferta {

    const TABLA = 'ofertas';

    public function insertarOferta($producto,$precio,$imagen_url,$codigo_mesa,$tipo_oferta) {
        try {
          $conexion = new Conexion();
          $sql = "INSERT INTO ".self::TABLA." (producto,precio,imagen_url,codigo_mesa,tipo_ofertas_id,estado) VALUES(?,?,?,?,?,1)";
          $consulta = $conexion->prepare($sql);
          $consulta->bindParam(1,$producto);
          $consulta->bindParam(2,$precio);
          $consulta->bindParam(3,$imagen_url);
          $consulta->bindParam(4,$codigo_mesa);
          $consulta->bindParam(5,$tipo_oferta);
          $consulta->execute();
        } catch (Exception $e) {

        }
    }

    public static function obetenerOfertas() {
        $conexion = new Conexion();
        $sql = "SELECT oferta_id,codigo_mesa,detalle,imagen_url,precio,producto FROM " . self::TABLA . " WHERE estado = 1";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function actualizarOfertas($producto,$detalle,$precio,$imagen_url,$codigo_mesa,$oferta_id) {
        $conexion = new Conexion();
        $sql = "UPDATE ".self::TABLA." SET producto = ?, detalle = ?, precio = ?, imagen_url = ?, codigo_mesa = ? WHERE oferta_id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1,$producto);
        $consulta->bindParam(2,$detalle);
        $consulta->bindParam(3,$precio);
        $consulta->bindParam(4,$imagen_url);
        $consulta->bindParam(5,$codigo_mesa);
        $consulta->bindParam(6,$oferta_id);
        $consulta->execute();
    }

    public function borrarOferta($oferta) {
        try {
            $conexion = new Conexion();
            $sql = "UPDATE ".self::TABLA." SET estado = 0 WHERE oferta_id=?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1,$oferta);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function obtenerTipoOferta(){
      try {
        $conexion = new Conexion();
        $sql = "SELECT tipo_oferta,tipo_ofertas_id FROM tipo_ofertas WHERE estado = 1";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
      } catch (Exception $e) {

      }
    }

    //obtenemos la cantidad de ofertas para el panel de administración
    public static function obtenerCantidadOfertas(){
      try {
        $conexion = new Conexion();
        $sql = "SELECT count(*) as cantidad FROM ".self::TABLA." where estado = 1";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro;
      } catch (Exception $e) {

      }
    }
}
