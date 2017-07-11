<?php

/**
 * Description of Conexion
 *
 * @author Eduardo
 */

class Conexion extends PDO {

    private $tipo_de_base = 'mysql';
    private $host = '192.168.0.6';
    private $nombre_de_base = 'terrible_beer';
    private $usuario = 'eduardo';
    private $contrasena = 'eduardo';

    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena);
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}
