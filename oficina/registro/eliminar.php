<?php
include_once("../../login/check.php");
include_once("../../class/oficina.php");
$Cod=$_GET['Cod'];
$oficina=new oficina;
$oficina->eliminarRegistro("codoficina=".$Cod);
?>