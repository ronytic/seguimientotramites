<?php
include_once "../../login/check.php";
extract($_POST);

include_once "../../class/hojaruta.php";
$hojaruta = new hojaruta;

include_once "../../class/contrato.php";
$contrato = new contrato;

include_once "../../class/planimetria.php";
$planimetria = new planimetria;

$codoficinaorigen = $_SESSION['CodOficina'];

if ($tipodocumento == "contrato") {
    $valores = array(
        "contratofecha" => "'$contratofecha'",
        "contratoproveniente" => "'$contratoproveniente'",
        "contratocodtipocontrato" => "'$contratocodtipocontrato'",
        "contratoobra" => "'$contratoobra'",
        "contratoempresa" => "'$contratoempresa'",
        "contratomontoadjudicado" => "'$contratomontoadjudicado'",
        "contratodistrito" => "'$contratodistrito'",
        "contratoubicacion" => "'$contratoubicacion'",
        "contratofojas" => "'$contratofojas'",
        "contratocodoficinadestino" => "'$contratocodoficinadestino'",
        "contratominuta" => "'$contratominuta'",
        "contratoobservacion" => "'$contratoobservacion'",
    );
    $res = $contrato->insertarRegistro($valores);
    $codigo = $contrato->ultimo();
    $codoficinadestino = $contratocodoficinadestino;

} else {
    $valores = array(
        "planimetriahojaantigua" => "'$planimetriahojaantigua'",
        "planimetriacodtipodocumento" => "'$planimetriacodtipodocumento'",
        "planimetriafecha" => "'$planimetriafecha'",
        "planimetriaproveniente" => "'$planimetriaproveniente'",
        "planimetriareferencia" => "'$planimetriareferencia'",
        "planimetriafojas" => "'$planimetriafojas'",
        "planimetriacodoficinadestino" => "'$planimetriacodoficinadestino'",
        "planimetriaobservacion" => "'$planimetriaobservacion'",

    );
    $res = $planimetria->insertarRegistro($valores);
    $codigo = $planimetria->ultimo();
    $codoficinadestino = $planimetriacodoficinadestino;
}

$valores = array("tipodocumento" => "'$tipodocumento'",
    "codigo" => "'$codigo'",
    "codoficinaorigen" => "'$codoficinaorigen'",
    "fechaorigen" => "'" . date("Y-m-d") . "'",
    "horaorigen" => "'" . date("H:i:s") . "'",
    "estadoorigen" => "'1'",
    "codoficinadestino" => "'$codoficinadestino'",
    "fechadestino" => "'0000-00-00'",
    "horadestino" => "'00:00:00'",
    "estadodestino" => "'0'",
);
if ($codigo != "") {

    $res = $hojaruta->insertarRegistro($valores);
    $codigohojaruta = $hojaruta->ultimo();
}
//print_r($valores);
$folder = "../../";
$titulo = "Mensaje de Confirmación";
if ($res) {
    $mensaje[] = "La hoja de ruta Nº $codigohojaruta, fue registrada correctamente";

    $tipomensaje = "success";
} else {
    $mensaje[] = "Error al registrar la hoja de ruta";
    $tipomensaje = "danger";
}

include_once "respuesta.php";
