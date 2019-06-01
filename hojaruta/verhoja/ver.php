<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Hoja de Ruta";
$Cod=$_GET['Cod'];

include_once("../../class/hojaruta.php");
$hojaruta=new hojaruta;
$hr=$hojaruta->mostrarTodoRegistro("codhojaruta=".$Cod);
$hr=array_shift($hr);

switch($hr['tipodocumento']){
    case 'planimetria':{$tipodocnombre="Planimetria";$ClaseDocOculto="contrato";}break;
    case 'contrato':{$tipodocnombre="Contrato";$ClaseDocOculto="planimetria";}break;
}

switch($hr['estadodestino']){
    case 0:{$estadodestino="Pendiente";}break;
    case 1:{$estadodestino="Recibido";}break;
}

include_once("../../class/contrato.php");
$contrato=new contrato;

include_once("../../class/planimetria.php");
$planimetria=new planimetria;

if($hr['tipodocumento']=="contrato"){
    $con=$contrato->mostrarTodoRegistro("codcontrato=".$hr['codigo']);
    $c=array_shift($con);

    $pla=$planimetria->mostrarTodoRegistro("codplanimetria=-100");
    $p=array_shift($pla);
}else{
    $pla=$planimetria->mostrarTodoRegistro("codplanimetria=".$hr['codigo']);
    $p=array_shift($pla);

    $con=$contrato->mostrarTodoRegistro("codcontrato=-100");
    $c=array_shift($con);
}

include_once("../../class/oficina.php");
$oficina=new oficina;

$ofo=$oficina->mostrarTodoRegistro("codoficina=".$hr['codoficinaorigen']);
$ofo=array_shift($ofo);
$ofd=$oficina->mostrarTodoRegistro("codoficina=".$hr['codoficinadestino']);
$ofd=array_shift($ofd);


$of=todolista($oficina->mostrarTodoRegistro(),"codoficina","nombre");

include_once("../../class/tipocontrato.php");
$tipocontrato=new tipocontrato;
$tipocon=($tipocontrato->mostrarTodoRegistro("codtipocontrato=".$c['contratocodtipocontrato']));
$tipocon=array_shift($tipocon);


include_once("../../class/tipodocumento.php");
$tipodocumento=new tipodocumento;
$tipodoc=($tipodocumento->mostrarTodoRegistro("codtipodocumento=".$p['planimetriacodtipodocumento']));
$tipodoc=array_shift($tipodoc);

$est=array(0=>"Pendiente",1=>"Recibido");

include_once("../../cabecerahtml.php");
?>
<style>
.<?=$ClaseDocOculto;?>{
    display:none;
}
</style>
<script>

$(document).ready(function(){
    $("#guardarenvio").submit(function (e) {
        if(!confirm("¿Desea confirmar el envio a otra oficina?")){
            e.preventDefault();
        }
    });
});
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">


    <div class="table-responsive">
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">Nro de Hoja de Ruta</th>
                    <th class="text-center">Tipo de Documento</th>
                    <th class="text-center">Oficina Origen</th>
                    <th class="text-center">Fecha Envio</th>
                    <th class="text-center">Oficina Destino</th>
                    <th class="text-center">Fecha Recepción</th>
                    <th class="text-center">Estado</th>
                </tr>
            </thead>
            <tr>
                <td class="text-center"><?=$hr['codhojaruta'];?></td>
                <td class="text-center"><?=$tipodocnombre;?></td>
                <td class="text-center"><?=$ofo['nombre'];?></td>
                <td class="text-center"><span class="badge badge-default"><?=$hr['fechaorigen'];?> <?=$hr['horaorigen'];?></span></td>
                <td class="text-center"><?=$ofd['nombre'];?></td>
                <td class="text-center"><span class="badge badge-default"><?=$hr['fechadestino'];?> <?=$hr['horadestino'];?></span></td>
                <td class="text-center"><?=$estadodestino;?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <div class="panel">
            <div class="panel-title">Datos</div>
            <div class="panel-body">
            <table class="table table table-bordered table-hover contrato">

                <tr>
                    <td class="text-right">Fecha</td>
                    <td><?=$c['contratofecha'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Proveniente de</td>
                    <td><?=$c['contratoproveniente'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Tipo de Contrato</td>
                    <td><?=$tipocon['nombre'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Obra</td>
                    <td><?=$c['contratoobra'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Empresa</td>
                    <td><?=$c['contratoempresa'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Monto Adjudicado</td>
                    <td><?=$c['contratomontoadjudicado'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Distrito</td>
                    <td><?=$c['contratodistrito'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Ubicación Exacta</td>
                    <td><?=$c['contratoubicacion'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Fojas</td>
                    <td><?=$c['contratofojas'];?></td>
                </tr>
                <tr>
                    <td class="text-right">Observación</td>
                    <td><?=$c['contratoobservacion'];?></td>
                </tr>
            </table>
            <table class="table table table-bordered table-hover planimetria">
                <tr class="planimetria">
                    <td class="text-right">Hoja de Ruta Antigüa</td>
                    <td><?=$p['planimetriahojaantigua'];?></td>
                </tr>
                <tr class="planimetria">
                    <td class="text-right">Tipo de Documento</td>
                    <td><?=$tipodoc['nombre'];?></td>
                </tr>
                <tr class="planimetria">
                    <td class="text-right">Fecha</td>
                    <td><?=$p['planimetriafecha'];?></td>
                </tr>
                <tr class="planimetria">
                    <td class="text-right">Proveniente de</td>
                    <td><?=$p['planimetriaproveniente'];?></td>
                </tr>
                <tr class="planimetria">
                    <td class="text-right">Referencia</td>
                    <td><?=$p['planimetriareferencia'];?></td>
                </tr>
                <tr class="planimetria">
                    <td class="text-right">Fojas</td>
                    <td><?=$p['planimetriafojas'];?></td>
                </tr>

                <tr class="planimetria">
                    <td class="text-right">Observación</td>
                    <td><?=$p['planimetriaobservacion'];?></td>
                </tr>
            </table>
            </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-title">Estado de la hoja Ruta</div>
                <div class="panel-body">
                    <form action="guardarestado.php" method="post">
                        <input type="hidden" name="codhojaruta" value="<?=$Cod;?>">
                        <?php
                            campo("estado","select",$est,"form-control",0,"",0,"",$hr['estadodestino'],0)
                        ?>
                        <br>
                        <input type="submit" value="Cambiar Estado" class="btn btn-warning btn-xss">
                    </form>
                </div>
            </div>
            <div class="panel">
                <div class="panel-title">Enviar a otra oficina</div>
                <div class="panel-body">
                    <form action="enviar.php" method="post" id="guardarenvio">
                        <input type="hidden" name="codhojaruta" value="<?=$Cod;?>">
                        <?php
                            campo("codoficinadestino","select",$of,"form-control",0,"",0,"",null,1)
                        ?>
                        <br>
                        <input type="submit" value="Enviar a otra oficina" class="btn btn-warning btn-xss">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include_once("../../pie.php");?>