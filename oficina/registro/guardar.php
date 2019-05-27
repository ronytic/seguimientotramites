<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/oficina.php");
$oficina=new oficina;
$valores=array("nombre"=>"'$nombre'",
                "telefonos"=>"'$telefonos'",
                "descripcion"=>"'$descripcion'",
            );
$res=$oficina->insertarRegistro($valores);
//print_r($valores);
$folder="../../";
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="La oficina fue registrada correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al Registrar la oficina";
    $tipomensaje="danger";
}

include_once("respuesta.php");
?>