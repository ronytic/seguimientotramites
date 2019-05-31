<?php
include_once("../../login/check.php");
include_once("../../class/hojaruta.php");
$Cod=$_GET['Cod'];
$hojaruta=new hojaruta;
$hojaruta->eliminarRegistro("codhojaruta=".$Cod);
?>