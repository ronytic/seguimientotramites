<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/tipocontrato.php");
$tipocontrato=new tipocontrato;
$tip=$tipocontrato->mostrarTodoRegistro("nombre LIKE '$nombre%' and descripcion LIKE '$descripcion%'",1,"nombre");
listadotabla(array("nombre"=>"Nombre","descripcion"=>"Descripción"),$tip,1,"","modificar.php","eliminar.php");
?>