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
$mensajedeObservacion = "";

if ($tipodocumento == "planimetria") {
    $hr = $hojaruta->queryE("SELECT count(*) as cantidad,codoficinaorigen,tipodocumento,tc.nombre FROM hojaruta hr JOIN planimetria p on p.codplanimetria=hr.codigo JOIN tipodocumento tc ON tc.codtipodocumento=p.planimetriacodtipodocumento WHERE tipodocumento LIKE 'planimetria' and hr.fecharegistro BETWEEN '$fechadesde' and '$fechahasta' and hr.activo=1  GROUP BY p.planimetriacodtipodocumento", "lock");
}
if ($tipodocumento == "contrato") {
    $hr = $hojaruta->queryE("SELECT count(*) as cantidad,codoficinaorigen,tipodocumento,tc.nombre FROM hojaruta hr JOIN contrato c on c.codcontrato=hr.codigo JOIN tipocontrato tc ON tc.codtipocontrato=c.contratocodtipocontrato WHERE tipodocumento LIKE 'contrato' and hr.fecharegistro BETWEEN '$fechadesde' and '$fechahasta' and hr.activo=1  GROUP BY c.contratocodtipocontrato", "lock");
}
if ($tipodocumento == "otros") {
    $hr = $hojaruta->queryE("SELECT count(*) as cantidad,codoficinaorigen,tipodocumento,tc.nombre FROM hojaruta hr JOIN planimetria p on p.codplanimetria=hr.codigo JOIN tipodocumento tc ON tc.codtipodocumento=p.planimetriacodtipodocumento WHERE tipodocumento LIKE 'otros' and hr.fecharegistro BETWEEN '$fechadesde' and '$fechahasta' and hr.activo=1  GROUP BY p.planimetriacodtipodocumento", "lock");
}
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
    $data[$i]['oficina'] = $h['nombre'];
    $data[$i]['cantidad'] = $h['cantidad'];

}
switch ($tipodocumento) {
    case 'planimetria':{ $tipodoc = "Planimetria";}break;
    case 'contrato':{ $tipodoc = "Contrato";}break;
    case 'otros':{ $tipodoc = "Otros";}break;
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
        text: 'Reporte General de Estadístico de Resoluciones '
    },
    subtitle: {
        text: 'Tipo de Documento: <?php echo $tipodoc; ?>'
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
