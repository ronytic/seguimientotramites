<?php
require_once("../../login/check.php");
$titulo="HOJA DE RUTA CONTRATO";
require_once("../../impresion/pdf.php");
$pdf=new PPDF("P","mm","letter");
$pdf->AddPage();
$pdf->Output();
?>