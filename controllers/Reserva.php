<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reserva
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Reserva {

    const TABLA = 'reservas';

    public static function obtenerReservas() {
        try {
            $conexion = new Conexion();
            //obtenemos la información que se mostrara en la vista del cajero
            $sql = "SELECT reservas.codigo_mesa,reservas.cantidad,reservas.fecha_reserva,"
                    . " TIMESTAMPDIFF(MINUTE, reservas.fecha_reserva, now()) AS 'desde_hace',"
                    . "reservas.estado,ofertas.producto,ofertas.precio,ofertas.imagen_url,"
                    . "ofertas.estado FROM " . self::TABLA . ""
                    . " INNER JOIN ofertas ON(reservas.oferta_id=ofertas.oferta_id);";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function insertarReservas() {
        
    }

    public function editarResrva() {
        
    }

}
