<?php

if (isset($_GET["codigo_mesa"])) {

require '../../clases/Consumo.php';
require '../../clases/ConsumoService.php';

//adquirimos las variables que vamos a utilizar
$codigo_mesa = $_GET["codigo_mesa"];
$consumoService = new ConsumoService();
$obtenemosLitrosMasConsumo = $consumoService->obtenerLitrosMasConsumo($codigo_mesa);
$litros = $obtenemosLitrosMasConsumo["litros"];
$consumo_id = $obtenemosLitrosMasConsumo["consumo_id"];

//asignamos los litros del buffer al historico de consumo
$consumo = new Consumo();
$ultimoConsumo = $consumo->obtenerUltimoConsumo();
/*echo $litros." consumo: ".$ultimoConsumo["consumo_id"];
exit();*/
$asignarLitros = $consumo->asignarLitrosConsumo($litros,$ultimoConsumo["consumo_id"]);
//borramos el registro en buffer de consumo
$borrarMesaEnServicio = $consumoService->terminarConsumoMesa($codigo_mesa);

header("Location: ../../views/cajero/inicio-cajero.php");

}else{
  header("Location: ../../index.php");
}


?>
