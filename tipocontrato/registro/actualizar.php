<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/tipocontrato.php");
$tipocontrato=new tipocontrato;

$valores=array("nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
            );


$res=$tipocontrato->actualizarRegistro($valores,"codtipocontrato=".$cod);
//print_r($valores);
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="El tipo de contrato fue modificado correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al modificar el tipo de contrato";
    $tipomensaje="danger";
}
$folder="../../";
include_once("respuesta.php");
?>