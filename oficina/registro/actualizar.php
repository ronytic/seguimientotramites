<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/oficina.php");
$oficina=new oficina;

$valores=array("nombre"=>"'$nombre'",
                "descripcion"=>"'$descripcion'",
            );


$res=$oficina->actualizarRegistro($valores,"codoficina=".$cod);
//print_r($valores);
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="La oficina fue modificada correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al modificar la oficina";
    $tipomensaje="danger";
}
$folder="../../";
include_once("respuesta.php");
?>