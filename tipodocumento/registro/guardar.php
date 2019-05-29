<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/tipodocumento.php");
$tipodocumento=new tipodocumento;
$valores=array("nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
            );
$res=$tipodocumento->insertarRegistro($valores);
//print_r($valores);
$folder="../../";
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="El tipo de documento fue registrado correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al registrar el tipo de documento";
    $tipomensaje="danger";
}

include_once("respuesta.php");
?>