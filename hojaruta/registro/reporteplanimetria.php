<?php
require_once("../../login/check.php");

extract($_GET);
include_once("../../class/hojaruta.php");
$hojaruta=new hojaruta;
$hr=$hojaruta->mostrarTodoRegistro("codhojaruta=".$cod);
$hr=array_shift($hr);


$titulo="HOJA DE RUTA PLANIMETRIA";
require_once("../../impresion/pdf.php");
$pdf=new PPDF("P","mm","A4");
$pdf->AddPage();

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
$pdf->Output();
?>