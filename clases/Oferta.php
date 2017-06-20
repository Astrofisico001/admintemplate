<?php

/**
 * Description of Oferta
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Oferta {

    const TABLA = 'ofertas';

    public function insertarOferta($producto,$detalle,$precio,$imagen_url,$codigo_mesa) {
        try {
          $conexion = new Conexion();
          $sql = "INSERT INTO ".self::TABLA." (producto,detalle,precio,imagen_url) VALUES(?,?,?,?,?)";
          $consulta = $conexion->prepare($sql);
          $consulta->bindParam(1,$producto);
          $consulta->bindParam(2,$detalle);
          $consulta->bindParam(3,$precio);
          $consulta->bindParam(4,$imagen_url);
          $consulta->bindParam(5,$codigo_mesa);
          $consulta->execute();
        } catch (Exception $e) {

        }

    }

    public static function obetenerOfertas() {
        $conexion = new Conexion();
        $sql = "SELECT codigo_mesa,detalle,imagen_url,precio,producto FROM " . self::TABLA . "";
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

}
