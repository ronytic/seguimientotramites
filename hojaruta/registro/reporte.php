<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Reporte de Hoja de Ruta";
$Cod=$_GET['Cod'];

include_once("../../class/hojaruta.php");
$hojaruta=new hojaruta;
$hr=$hojaruta->mostrarTodoRegistro("codhojaruta=".$Cod);
$hr=array_shift($hr);




$url="reporte".$hr['tipodocumento'].".php?cod=$Cod&codigo=".$hr['codigo'];

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <iframe src="<?=$url;?>" frameborder="0" width="100%" height="600"></iframe>
</div>
<?php include_once("../../pie.php");?>