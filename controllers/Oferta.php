<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oferta
 *
 * @author Eduardo
 */
require_once '../../conexion/Conexion.php';

class Oferta {

    private $producto;
    private $detalle;
    private $precio;
    private $imagenUrl;
    private $codigoMesa;
    private $estado;

    const TABLA = 'ofertas';

    function getProducto() {
        return $this->producto;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getImagenUrl() {
        return $this->imagenUrl;
    }

    function getCodigoMesa() {
        return $this->codigoMesa;
    }

    function getEstado() {
        return $this->estado;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setImagenUrl($imagenUrl) {
        $this->imagenUrl = $imagenUrl;
    }

    function setCodigoMesa($codigoMesa) {
        $this->codigoMesa = $codigoMesa;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function __construct($producto, $detalle, $precio, $imagenUrl, $codigoMesa, $estado) {
        $this->producto = $producto;
        $this->detalle = $detalle;
        $this->precio = $precio;
        $this->imagenUrl = $imagenUrl;
        $this->codigoMesa = $codigoMesa;
        $this->estado = $estado;
    }

    public function insertarOferta() {
        
    }

    public static function obetenerOfertas() {
        $conexion = new Conexion();
        $sql = "SELECT codigo_mesa,detalle,imagen_url,precio,producto FROM " . self::TABLA . "";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function __actualizarOfertas() {
        
    }

}
