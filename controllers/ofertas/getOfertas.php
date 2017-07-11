<?php

require '../../clases/Oferta.php';
$ofertas = new Oferta();
$listaOfertas = $ofertas->obetenerOfertas();
$tiposOfertas = $ofertas->obtenerTipoOferta();
