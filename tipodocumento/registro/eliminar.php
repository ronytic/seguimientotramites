<?php
include_once("../../login/check.php");
include_once("../../class/tipodocumento.php");
$Cod=$_GET['Cod'];
$tipodocumento=new tipodocumento;
$tipodocumento->eliminarRegistro("codtipodocumento=".$Cod);
?>