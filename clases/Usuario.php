<?php

/**
 * Description of Usuario
 *
 * @author Beer Developers
 */
require_once '../../conexion/Conexion.php';

class Usuario {

    const TABLA = "usuarios";

    //obtenemos todos los usuarios
    public static function obtenerUsuarios() {
        $conexion = new Conexion();
        $sql = "SELECT user.telefono,user.nombre_completo, user.correo, "
                . "user.fecha_ingreso,estado, tp.tipo_usuario,user.img_url_perfil FROM " . self::TABLA . " as user"
                . " INNER JOIN tipos_usuarios as tp ON(user.tipo_usuario_id=tp.tipo_usuario_id); ";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function agregarUsuario($nombre, $correo, $telefono, $password) {
        $conexion = new Conexion();
        $sql = "INSERT INTO usuarios (nombre_completo,correo,telefono,password) VALUES(?,?,?,?)";
        //preparamos la consulta
        $consulta = $conexion->prepare($sql);
        //indicamos el valor que queremos asignar para cada campo
        $consulta->bindParam(1, $nombre);
        $consulta->bindParam(2, $correo);
        $consulta->bindParam(3, $telefono);
        $consulta->bindParam(4, $password);
        //ejecutamos la consulta
        $consulta->execute();
    }

    //verificar estado de conexión de usuario
    public static function retornarEstado($usuarioId) {
        try {
            $conexion = new Conexion();
            $sql = "SELECT estado FROM usuarios WHERE usuario_id=? AND estado=1";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $usuarioId);
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
            preg_replace('/\s+/', ' ', $nombre);
            preg_replace('/\s+/', ' ', $correo);
            preg_replace('/\s+/', ' ', $telefono);
            $conexion = new Conexion();
            //$usuarioId = self::buscarUsuario($nombre, $correo);
            $sql = "UPDATE " . self::TABLA . " SET nombre_completo = '$nombre', correo = "
                    . "'$correo', telefono = '$telefono' WHERE usuario_id = 1;";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //actualizamos la foto de perfil de cualquier usuario
    public function actualizarFotoPerfil($idUsuario, $foto) {
        try {
            $conexion = new Conexion();
            $sql = "UPDATE " . self::TABLA . " SET img_url_perfil = '$foto' WHERE usuario_id='$idUsuario'";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //buscar usuario_id y usar en la misma clase
    private static function buscarUsuario($nombre, $correo) {
        try {
            preg_replace('/\s+/', ' ', $nombre);
            preg_replace('/\s+/', ' ', $correo);
            $conexion = new Conexion();
            $sql = "SELECT usuario_id FROM " . self::TABLA . " WHERE nombre_completo='$nombre' AND correo='$correo'";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetch();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //obtener usuarios para la vista adminsitrador
    public static function getUsuarios() {
        try {
            $conexion = new Conexion();
            $sql = "SELECT nombre_completo,telefono,correo,img_url_perfil,usuario_id FROM " . self::TABLA . "";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function borrarUsuario($usuario) {
        try {
            $conexion = new Conexion();
            $sql = "DELETE FROM " . self::TABLA . " WHERE usuario_id=$usuario";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function validarUsuario($correo, $password) {
        try {
            $conexion = new Conexion();
            $sql = "SELECT correo,password FROM " . self::TABLA . " WHERE correo = ? AND password = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $correo);
            $consulta->bindParam(2, $password);
            $consulta->execute();
            $registro = $consulta->fetch();
            return $registro;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
