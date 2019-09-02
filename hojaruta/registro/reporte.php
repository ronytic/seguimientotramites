<?php
include_once "../../login/check.php";
$folder = "../../";
$titulo = "Reporte de Hoja de Ruta";
$Cod = $_GET['Cod'] ?? $_GET['cod'];

$url = "reportecontrato.php?codigo=" . $Cod;

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <iframe src="<?=$url;?>" frameborder="0" width="100%" height="600"></iframe>
</div>
<?php include_once "../../pie.php";?>