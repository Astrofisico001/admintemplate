<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mesa
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Mesa {

    //put your code here


    const TABLA = 'mesas';

    public function obtenerMesas() {
        try {
            $conexion = new Conexion();
            $sql = "SELECT estado FROM " . self::TABLA . "";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            //retornamos el listado de mesas con su estado
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
