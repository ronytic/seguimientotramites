<?php
include_once("../../login/check.php");
include_once("../../class/tipocontrato.php");
$Cod=$_GET['Cod'];
$tipocontrato=new tipocontrato;
$tipocontrato->eliminarRegistro("codtipocontrato=".$Cod);
?>