<?php

/**
 * Description of Cliente
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Cliente {

    const TABLA = 'clientes';

    public static function obtenerClientes() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT nombre_completo,telefono,correo_electronico'
                . ' FROM ' . self::TABLA . ' '
                . 'ORDER BY nombre_completo');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

  /*  public function insertarClientePremium($nombre, $telefono, $correo_electronico, $fecha_nacimiento, $fecha_ingreso, $img_url, $genero, $premium) {
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO " . self::TABLA . "(nombre_completo,telefono,correo_electronico,fecha_nacimiento,fecha_ingreso,img_url,genero,premium) VALUES (?,?,?,?,?,?,?,?)";
            $consulta = $conexion->prepare($sql);
            //asignamos los valores que vamos a ingresar
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $telefono);
            $consulta->bindParam(3, $correo_electronico);
            $consulta->bindParam(4, $fecha_nacimiento);
            $consulta->bindParam(5, $fecha_ingreso);
            $consulta->bindParam(6, $img_url);
            $consulta->bindParam(7, $genero);
            $consulta->bindParam(8, $premium);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }*/


    public function agregarCliente($nombre, $telefono, $email) {
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO " . self::TABLA . " (nombre_completo,telefono,correo_electronico,estado) VALUES(?,?,?,1)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $telefono);
            $consulta->bindParam(3, $email);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function borrarCliente($cliente) {
        try {
            $conexion = new Conexion();
            $sql = "DELETE FROM clientes WHERE cliente_id = ? ";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $cliente);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //obtiene el consumo total de cada cliente agrupado por el id del cliente
    public static function obtenerClientesMasConsumo() {
        try {
            $conexion = new Conexion();
            $sql = "SELECT " . self::TABLA . ".cliente_id," . self::TABLA . ".telefono, " . self::TABLA . ".img_url as imagen,"
                    . "" . self::TABLA . ".nombre_completo," . self::TABLA . ".correo_electronico,"
                    . " sum(consumos.litros) AS total FROM " . self::TABLA . " INNER JOIN"
                    . " consumos ON(consumos.cliente_id=" . self::TABLA . ".cliente_id)"
                    . " GROUP BY " . self::TABLA . ".cliente_id ORDER BY sum(consumos.litros) DESC;";
            //preparamos la consulta
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            //retornamos todos los registros
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    //obtenemos la cantidad de clientes para la pagina de inicio del administrador
    public static function obtenerCantidadClientes(){
      try {
        $conexion = new Conexion();
        $sql = "SELECT count(*) as cantidad FROM ".self::TABLA." WHERE estado = 1";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetch();
        return $registros;
      } catch (Exception $e) {
      }
    }

    public static function obtenerUltimoCliente(){
      try {
        $conexion = new Conexion();
        $sql = "SELECT cliente_id FROM clientes ORDER BY cliente_id desc";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro;
      } catch (Exception $e) {

      }

    }


}
