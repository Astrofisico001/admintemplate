<?php

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
            $sql = "SELECT codigo_mesa,litros FROM buffer_consumos";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function obtenerLitrosMasConsumo($codigo_mesa){
      try {
        $conexion = new Conexion();
        $sql = "SELECT litros,consumo_id FROM buffer_consumos WHERE codigo_mesa = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1,$codigo_mesa);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro;
      } catch (Exception $e) {

      }
    }

    //cerramos el consumo desde la interfaz del cajero
    public function terminarConsumoMesa($codigo_mesa){
      try {
        $conexion = new Conexion();
        $sql = "DELETE FROM buffer_consumos WHERE codigo_mesa = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1,$codigo_mesa);
        $consulta->execute();
      } catch (Exception $e) {
      }
    }

    //activamos la mesa para su uso
    public function activarMesa($consumo_id,$codigo_mesa){
      try {
        $conexion = new Conexion();
        $sql = "INSERT INTO buffer_consumos (consumo_id,codigo_mesa,litros) VALUES(?,?,0)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1,$consumo_id);
        $consulta->bindParam(2,$codigo_mesa);
        $consulta->execute();
      } catch (Exception $e) {

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
