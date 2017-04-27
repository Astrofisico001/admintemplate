<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Consumo
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Consumo {

    const TABLA = 'consumos';

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

    //obtener consumo por tiempo
    //obtener información de consumo por mesa
}
