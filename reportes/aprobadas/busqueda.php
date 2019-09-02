<?php
include_once "../../login/check.php";
extract($_POST);

$tipodocumento = $tipodocumento != "" ? $tipodocumento : "%";
$fechadesde = $fechadesde != "" ? $fechadesde : "%";
$fechahasta = $fechahasta != "" ? $fechahasta : "%";
$url = "reporte.php?tipodocumento=$tipodocumento&fechadesde=$fechadesde&fechahasta=$fechahasta";

?>
 <iframe src="<?=$url;?>" frameborder="0" width="100%" height="600"></iframe>
