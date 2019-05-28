<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/tipocontrato.php");
$tipocontrato=new tipocontrato;
$valores=array("nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
            );
$res=$tipocontrato->insertarRegistro($valores);
//print_r($valores);
$folder="../../";
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="El tipo de contrato fue registrado correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al registrar el tipo de contrato";
    $tipomensaje="danger";
}

include_once("respuesta.php");
?>