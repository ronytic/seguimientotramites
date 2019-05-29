<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/tipodocumento.php");
$tipodocumento=new tipodocumento;

$valores=array("nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
            );


$res=$tipodocumento->actualizarRegistro($valores,"codtipodocumento=".$cod);
//print_r($valores);
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="El tipo de documento fue modificado correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al modificar el tipo de documento";
    $tipomensaje="danger";
}
$folder="../../";
include_once("respuesta.php");
?>