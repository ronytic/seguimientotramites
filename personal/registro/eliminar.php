<?php
include_once("../../login/check.php");
include_once("../../class/usuario.php");
$Cod=$_GET['Cod'];
$usuario=new usuario;
$usuario->eliminarRegistro("CodUsuario=".$Cod);
?>