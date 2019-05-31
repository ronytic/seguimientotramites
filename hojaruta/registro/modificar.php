<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Hoja de Ruta";
$Cod=$_GET['Cod'];

include_once("../../class/hojaruta.php");
$hojaruta=new hojaruta;
$hr=$hojaruta->mostrarTodoRegistro("codhojaruta=".$Cod);
$hr=array_shift($hr);

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
$of=todolista($oficina->mostrarTodoRegistro(),"codoficina","nombre");

include_once("../../class/tipocontrato.php");
$tipocontrato=new tipocontrato;
$tipocon=todolista($tipocontrato->mostrarTodoRegistro(),"codtipocontrato","nombre");

include_once("../../class/tipodocumento.php");
$tipodocumento=new tipodocumento;
$tipodoc=todolista($tipodocumento->mostrarTodoRegistro(),"codtipodocumento","nombre");

include_once("../../cabecerahtml.php");
?>
<style>
.planimetria,.contrato{
    display:none;
}
</style>
<script>

$(document).ready(function(){
    var el=$("[name=tipodocumento]").val();
    // $(".planimetria,.contrato").slideUp(0)
    $("."+el).slideDown(0);
    $("[name=tipodocumento]").change(function(){
        var el=$(this).val();
        $(".planimetria,.contrato").slideUp(0,function(){

        });
        $("."+el).slideDown(0);
    });
});
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <input type="hidden" name="codigo" value="<?php echo $hr['codigo'];?>">
    <table class="table tables table-bordereds table-hovers">
        <tr>
            <td class="text-right">Nro de Hoja de Ruta</td>
            <td><input type="text" name="nro" class="form-control" readonly value="<?=$hr['codhojaruta'];?>"></td>
        </tr>
        <tr>
            <td class="text-right">Tipo de Documento</td>
            <td><select name="tipodocumento" class="form-control" readonly onmouseover="this.disabled=true;" onmouseout="this.disabled=false;">
                    <option value="">Seleccionar Tipo de Documento</option>
                    <option value="contrato" <?=$hr['tipodocumento']=="contrato"?'selected="selected"':'';?>>Contrato</option>
                    <option value="planimetria" <?=$hr['tipodocumento']=="planimetria"?'selected="selected"':'';?>>Planimetria y otros</option>
                </select>
            </td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Fecha</td>
            <td><input type="date" name="contratofecha" class="form-control"  value="<?=$c['contratofecha'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Proveniente de</td>
            <td><input type="text" name="contratoproveniente" class="form-control"  value="<?=$c['contratoproveniente'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Tipo de Contrato</td>
            <td><?php
                    campo("contratocodtipocontrato","select",$tipocon,"form-control",0,"",0,"",$c['contratocodtipocontrato'],1)
                ?></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Obra</td>
            <td><input type="text" name="contratoobra" class="form-control"  value="<?=$c['contratoobra'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Empresa</td>
            <td><input type="text" name="contratoempresa" class="form-control"  value="<?=$c['contratoempresa'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Monto Adjudicado</td>
            <td><input type="number" name="contratomontoadjudicado" class="form-control"  value="<?=$c['contratomontoadjudicado'];?>" step="0.01" min="0"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Distrito</td>
            <td><input type="text" name="contratodistrito" class="form-control"  value="<?=$c['contratodistrito'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Ubicación Exacta</td>
            <td><input type="text" name="contratoubicacion" class="form-control"  value="<?=$c['contratoubicacion'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Fojas</td>
            <td><input type="text" name="contratofojas" class="form-control"  value="<?=$c['contratofojas'];?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Oficina Destino</td>
            <td>
                <?php
                    campo("contratocodoficinadestino","select",$of,"form-control",0,"",0,"",$c['contratocodoficinadestino'],1)
                ?>
            </td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Observación</td>
            <td><textarea type="text" name="contratoobservacion" class="form-control"><?=$c['contratoobservacion'];?></textarea></td>
        </tr>

        <tr class="planimetria">
            <td class="text-right">Hoja de Ruta Antigüa</td>
            <td><input type="text" name="planimetriahojaantigua" class="form-control"  value="<?=$p['planimetriahojaantigua'];?>"></td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Tipo de Documento</td>
            <td><?php
                    campo("planimetriacodtipodocumento","select",$tipodoc,"form-control",0,"",0,"",$p['planimetriacodtipodocumento'],1)
                ?></td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Fecha</td>
            <td><input type="date" name="planimetriafecha" class="form-control"  value="<?=$p['planimetriafecha'];?>"></td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Proveniente de</td>
            <td><input type="text" name="planimetriaproveniente" class="form-control"  value="<?=$p['planimetriaproveniente'];?>"></td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Referencia</td>
            <td><input type="text" name="planimetriareferencia" class="form-control"  value="<?=$p['planimetriareferencia'];?>"></td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Fojas</td>
            <td><input type="text" name="planimetriafojas" class="form-control"  value="<?=$p['planimetriafojas'];?>"></td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Oficina Destino</td>
            <td>
                <?php
                    campo("planimetriacodoficinadestino","select",$of,"form-control",0,"",0,"",$p['planimetriacodoficinadestino'],1)
                ?>
            </td>
        </tr>
        <tr class="planimetria">
            <td class="text-right">Observación</td>
            <td><textarea type="text" name="planimetriaobservacion" class="form-control"><?=$p['planimetriaobservacion'];?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>