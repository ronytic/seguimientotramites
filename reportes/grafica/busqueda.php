<?php
include_once "../../login/check.php";
extract($_POST);

$tipodocumento = $tipodocumento != "" ? $tipodocumento : "%";
$fechadesde = $fechadesde != "" ? $fechadesde : "%";
$fechahasta = $fechahasta != "" ? $fechahasta : "%";

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
$data = [];
$i = 1;
foreach ($hr as $h) {$i++;
    $ofo = $oficina->mostrarTodoRegistro("codoficina=" . $h['codoficinaorigen']);
    $ofo = array_shift($ofo);
    $data[$i]['oficina'] = $ofo['nombre'];
    $data[$i]['cantidad'] = $h['cantidad'];

}
?>


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Reporte de Estadístico de Resoluciones Aprobadas'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Oficina',
        colorByPoint: true,
        data: [
        <?php foreach ($data as $d) {
    ?>{
                name: '<?=$d['oficina'];?>',
                y:<?=$d['cantidad'];?>,
            },
            <?php
}?>
        ]
    }]
});</script>
