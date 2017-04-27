<?php

/**
 * Description of Cliente
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Cliente {

    private $nombreCompleto;
    private $telefono;
    private $correoElectronico;

    const TABLA = 'clientes';

    function getNombreCompleto() {
        return $this->nombreCompleto;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    function setNombreCompleto($nombreCompleto) {
        $this->nombreCompleto = $nombreCompleto;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }

    function __construct($nombreCompleto, $telefono, $correoElectronico) {
        $this->nombreCompleto = $nombreCompleto;
        $this->telefono = $telefono;
        $this->correoElectronico = $correoElectronico;
    }

    public static function obtenerClientes() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT nombre_completo,telefono,correo_electronico'
                . ' FROM ' . self::TABLA . ' '
                . 'ORDER BY nombre_completo');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function insertarCliente($nombre, $telefono, $correo_electronico, $fecha_nacimiento, $fecha_ingreso, $img_url, $genero, $premium) {
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO " . self::TABLA . "(nombre_completo,telefono,correo_electronico,fecha_nacimiento,fecha_ingreso,img_url,genero,premium) VALUES (?,?,?,?,?,?,?,?)";
            $consulta = $conexion->prepare($sql);
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
    }

    public function borrarCliente() {
        $conexion = new Conexion();
    }

    //obtiene el consumo total de cada cliente agrupado por el id del cliente
    public static function obtenerClientesMasConsumo() {
        try {
            $conexion = new Conexion();
            $sql = "SELECT " . self::TABLA . ".telefono, " . self::TABLA . ".img_url as imagen,"
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

}
