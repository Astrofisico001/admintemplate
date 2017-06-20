<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsumoService
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class ConsumoService {

    const TABLA = 'buffer_consumos';

    //obtenemos las mesas que se encuentran en estado de servicio
    public static function obtenerMesasEnServicio() {
        try {
            $conexion = new Conexion();
            //   $sql = "SELECT consumos.codigo_mesa as mesa,buffer_consumos.litros as litros FROM buffer_consumos INNER JOIN consumos ON(consumos.consumo_id=buffer_consumos.consumo_id) GROUP BY consumos.codigo_mesa;";
            $sql = "SELECT * FROM view_buffer_consumos";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //calculamos el precio correspondiente a los litros de consumo
    public static function calcularPrecioConsumo($litros) {
        //iniciamos variable para le precio total
        $precioTotal;
        //indicamos el precio por litro
        $precio = 1000;
        //realizamos la operación
        $precioTotal = $litros * $precio;
        //retornamos el valor
        return "$" . $precioTotal . ".-";
    }

}
