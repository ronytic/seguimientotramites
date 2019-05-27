<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/oficina.php");
$oficina=new oficina;
$ofi=$oficina->mostrarTodoRegistro("nombre LIKE '$nombre%' and descripcion LIKE '$descripcion%'",1,"nombre");
listadotabla(array("nombre"=>"Nombre","telefonos"=>"Teléfonos","descripcion"=>"Descripción"),$ofi,1,"","modificar.php","eliminar.php");
?>