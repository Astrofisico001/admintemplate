<?php

/**
 * Description of Usuario
 *
 * @author Beer Developers
 */
require_once '../../conexion/Conexion.php';

class Usuario {
    
    const TABLA = "usuarios";

    public static function obtenerUsuarios() {
        $conexion = new Conexion();
        $sql = "SELECT user.usuario_id,user.telefono,user.nombre_completo, user.correo, user.fecha_ingreso,estado, tp.tipo_usuario,img_url_perfil FROM " . self::TABLA . " as user INNER JOIN tipos_usuarios as tp ON(user.tipo_usuario_id=tp.tipo_usuario_id); ";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function ingresarUsuarios() {

        $conexion = new Conexion();
        try {
            $sql = "INSERT INTO " . self::TABLA . "(nombre) VALUES(:nombre) ";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre', $this->nombreCompleto);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //verificar estado de conexión de usuario
    public static function retornarEstado($usuarioId) {
        try {
            $conexion = new Conexion();
            $sql = "SELECT estado FROM usuarios WHERE usuario_id=" . $usuarioId . " AND estado=1";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetch();
            if ($registros != null)
                return true;
            else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actualizarUsuario($nombre, $correo, $telefono) {
        try {
            $conexion = new Conexion();
            //$usuarioId = self::buscarUsuario($nombre, $correo);
            $sql = "UPDATE " . self::TABLA . " SET nombre_completo = '$nombre', correo = '$correo', telefono = '$telefono' WHERE usuario_id = 1;";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //buscar usuario_id y usar en la misma clase
    private static function buscarUsuario($nombre, $correo) {
        try {
            $conexion = new Conexion();
            $sql = "SELECT usuario_id FROM " . self::TABLA . " WHERE nombre_completo='$nombre' AND correo='$correo'";
            $consulta = $conexion->prepare($sql);
          /*  $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':correo', $correo);
            $consulta->bindParam(':telefono', $telefono);*/
            $consulta->execute();
            $registros = $consulta->fetch();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
