<?php
require_once "../../login/check.php";
$codigo = $_GET['codigo'];
$titulo = "HOJA DE RUTA ";
require_once "../../impresion/pdf.php";
$pdf = new PPDF("P", "mm", "letter");
$pdf->AddPage();

include_once "../../class/hojaruta.php";
$hojaruta = new hojaruta;
include_once "../../class/oficina.php";
$oficina = new oficina;
$hr = $hojaruta->mostrarTodoRegistro("codhojaruta=$codigo", 1);
$hr = array_shift($hr);
// echo "<pre>";
// print_r($hr);
// echo "</pre>";
switch ($hr['tipodocumento']) {
    case 'planimetria':{ $tipodoc = "Planimetria";}break;
    case 'contrato':{ $tipodoc = "Contrato";}break;
    case 'otros':{ $tipodoc = "Otros";}break;
}
$ofo = $oficina->mostrarTodoRegistro("codoficina=" . $hr['codoficinaorigen']);
$ofo = array_shift($ofo);
$ofd = $oficina->mostrarTodoRegistro("codoficina=" . $hr['codoficinadestino']);
$ofd = array_shift($ofd);
$pdf->CuadroCuerpo(35, "Nro Hoja de Ruta", 1, "C", 1);
$pdf->CuadroCuerpo(35, "Tipo de Documento", 1, "C", 1);
$pdf->CuadroCuerpo(105, "Oficina Origen", 1, "C", 1);

$pdf->ln();
$pdf->CuadroCuerpo(35, $hr['codhojaruta'], 0, "C", 1);
$pdf->CuadroCuerpo(35, $tipodoc, 0, "C", 1);
$pdf->CuadroCuerpo(105, $ofo['nombre'], 0, "C", 1);
$pdf->ln(10);
$pdf->CuadroCuerpo(35, "", 0, "C", 0);
$pdf->CuadroCuerpo(35, "Fecha de Envio", 1, "C", 1);
$pdf->CuadroCuerpo(105, "Oficina Destino", 1, "C", 1);
$pdf->ln();

$pdf->CuadroCuerpo(35, "", 0, "C", 0);
$pdf->CuadroCuerpo(35, $hr['fechaorigen'], 0, "C", 1);
$pdf->CuadroCuerpo(105, $ofd['nombre'], 0, "C", 1);
$pdf->Output();
