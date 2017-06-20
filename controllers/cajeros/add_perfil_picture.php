<?php

//if (isset($_POST["username"])) {
//            $foto = $_FILES['foto']['name'];
//            $dir_subida = '../img/';
//            $fichero_subido = $dir_subida . basename($_FILES['foto']['name']);
//            move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido);
//            $objUser = new Usuario();
//            $usuario = $_POST["username"];
//            $password = $_POST["password"];
//            $nuevoUsuario = $objUser->insertUsuario($usuario, $password, $foto);
//       
//        }

if (isset($_POST[$img_perfil])) {
    $foto=$_FILES['foto']['name'];
    $dir_subida='../img/';
    $fichero_subido=$dir_subida.basename($_FILES['foto']['name']);
    move_uploaded_file($fichero_subido, $dir_subida);
    $usuario = new Usuario();
    
}

