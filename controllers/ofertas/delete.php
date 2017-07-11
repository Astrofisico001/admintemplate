<?php

if (isset($_GET["oferta"])) {
   require '../../clases/Oferta.php';
   $oferta = new Oferta();
   $borrarOferta = $oferta->borrarOferta($_GET["oferta"]);
   header("Location: ../../views/admin/ofertas-panel.php");

}
?>
