<?php
require_once "../../login/check.php";
$tipodocumento = $_GET['tipodocumento'] != "" ? $_GET['tipodocumento'] : '%';
$fechadesde = $_GET['fechadesde'];
$fechahasta = $_GET['fechahasta'];
$titulo = "Reporte de Resoluciones Aprobadas";
require_once "../../impresion/pdf.php";
class PDF extends PPDF
{
    public function Cabecera()
    {
        global $fechadesde, $fechahasta;
        $this->TituloCabecera(20, 'De:', 10, 0);
        $this->TituloCabecera(30, $fechadesde, 10, 0);
        $this->TituloCabecera(20, 'Hasta:', 10, 0);
        $this->TituloCabecera(30, $fechahasta, 10, 0);
        $this->ln();
    }
}
$pdf = new PDF("P", "mm", "letter");
$pdf->AddPage();

include_once "../../class/hojaruta.php";
$hojaruta = new hojaruta;
include_once "../../class/oficina.php";
$oficina = new oficina;
$hojaruta->campos = array("count(*) as cantidad,codoficinaorigen,tipodocumento");
$hr = $hojaruta->mostrarTodoRegistro("tipodocumento LIKE '$tipodocumento' and fechaorigen BETWEEN '$fechadesde' and '$fechahasta' and activo=1 and observacion LIKE '%aprobado%' GROUP BY codoficinaorigen ", 0);
// $hr = array_shift($hr);
// echo "<pre>";
// print_r($hr);
// echo "</pre>";
switch ($tipodocumento) {
    case 'planimetria':{ $tipodoc = "Planimetria";}break;
    case 'contrato':{ $tipodoc = "Contrato";}break;
    case 'otros':{ $tipodoc = "Otros";}break;
}
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->CuadroCuerpo(100, "DETALLE", 1, "C", 1);
$pdf->CuadroCuerpo(70, "TOTAL", 1, "C", 1);
$pdf->ln();
foreach ($hr as $h) {
    $ofo = $oficina->mostrarTodoRegistro("codoficina=" . $h['codoficinaorigen']);
    $ofo = array_shift($ofo);
    $pdf->CuadroCuerpo(100, $ofo['nombre'], 0, "C", 1, 9, "B");
    $pdf->CuadroCuerpo(70, $h['cantidad'], 0, "C", 1, 9, "B");
    $pdf->ln();
}

$pdf->Output();
