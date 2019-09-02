<?php
include_once "../../login/check.php";
$folder = "../../";
include_once "../../class/hojaruta.php";
$hojaruta = new hojaruta;
$estado = $hojaruta->estadoTabla();
$Nro = $estado['Auto_increment'];

include_once "../../class/oficina.php";
$oficina = new oficina;
$of = todolista($oficina->mostrarTodoRegistro(), "codoficina", "nombre");

include_once "../../class/tipocontrato.php";
$tipocontrato = new tipocontrato;
$tipocon = todolista($tipocontrato->mostrarTodoRegistro(), "codtipocontrato", "nombre");

include_once "../../class/tipodocumento.php";
$tipodocumento = new tipodocumento;
$tipodoc = todolista($tipodocumento->mostrarTodoRegistro(), "codtipodocumento", "nombre");

$titulo = "Registro de Nueva Hoja de Ruta";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// exit();
include_once "../../cabecerahtml.php";
?>
<style>
.planimetria,.contrato{
    display:none;
}
</style>
<script>
$(document).ready(function(){
    $("[name=tipodocumento]").change(function(){
        var el=$(this).val();
        $(".planimetria,.contrato").slideUp(0,function(){

        });
        $("."+el).slideDown(0);
    });

});
</script>
<script>
    $(document).ready(function(){
        $("#formularioRegistro").submit(function(e){
            if(!confirm("¿Esta seguro que desea Registrar la Hoja de Ruta?")){

            e.preventDefault();
            }

        });
    })
</script>
<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <form action="guardar.php" method="post" enctype="multipart/form-data" id="formularioRegistro">
    <table class="table tables table-bordereds table-hovers">
        <tr>
            <td class="text-right">Nro de Hoja de Ruta</td>
            <td><input type="text" name="nro" class="form-control" readonly value="<?=$Nro;?>"></td>
        </tr>
        <tr>
            <td class="text-right">Tipo de Registro</td>
            <td><select name="tipodocumento" class="form-control"  required>
                    <option value="">Seleccionar Tipo de Documento</option>
                    <option value="contrato">Contrato</option>
                    <option value="planimetria">Planimetria</option>
                    <option value="otros">Otros</option>
                </select>
            </td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Fecha</td>
            <td><input type="date" name="contratofecha" class="form-control"  value="<?=date("Y-m-d");?>"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Proveniente de</td>
            <td><input type="text" name="contratoproveniente" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Tipo de Contrato</td>
            <td><?php
campo("contratocodtipocontrato", "select", $tipocon, "form-control", 0, "", 0, "", null, 1)
?></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Obra</td>
            <td><input type="text" name="contratoobra" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Empresa</td>
            <td><input type="text" name="contratoempresa" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Monto Adjudicado</td>
            <td><input type="number" name="contratomontoadjudicado" class="form-control"  value="" step="0.01" min="0"></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Distrito</td>
            <td><input type="text" name="contratodistrito" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Ubicación Exacta</td>
            <td><input type="text" name="contratoubicacion" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Fojas</td>
            <td><input type="text" name="contratofojas" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Oficina Destino</td>
            <td>
                <?php
campo("contratocodoficinadestino", "select", $of, "form-control", 0, "", 0, "", null, 1)
?>
            </td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Minuta de Contrato</td>
            <td><input type="text" name="contratominuta" class="form-control"  value=""></td>
        </tr>
        <tr class="contrato">
            <td class="text-right">Observación</td>
            <td><textarea type="text" name="contratoobservacion" class="form-control"></textarea></td>
        </tr>



        <tr class="planimetria otros">
            <td class="text-right">Hoja de Ruta Antigüa</td>
            <td><input type="text" name="planimetriahojaantigua" class="form-control"  value=""></td>
        </tr>
        <tr class="planimetria otros">
            <td class="text-right">Tipo de Documento</td>
            <td><?php
campo("planimetriacodtipodocumento", "select", $tipodoc, "form-control", 0, "", 0, "", null, 1)
?></td>
        </tr>
        <tr class="planimetria otros ">
            <td class="text-right">Fecha</td>
            <td><input type="date" name="planimetriafecha" class="form-control"  value="<?=date("Y-m-d");?>"></td>
        </tr>
        <tr class="planimetria otros">
            <td class="text-right">Proveniente de</td>
            <td><input type="text" name="planimetriaproveniente" class="form-control"  value=""></td>
        </tr>
        <tr class="planimetria otros">
            <td class="text-right">Referencia</td>
            <td><input type="text" name="planimetriareferencia" class="form-control"  value=""></td>
        </tr>
        <tr class="planimetria otros">
            <td class="text-right">Fojas</td>
            <td><input type="text" name="planimetriafojas" class="form-control"  value=""></td>
        </tr>
        <tr class="planimetria otros">
            <td class="text-right">Oficina Destino</td>
            <td>
                <?php
campo("planimetriacodoficinadestino", "select", $of, "form-control", 0, "", 0, "", null, 1)
?>
            </td>
        </tr>
        <tr class="planimetria otros">
            <td class="text-right">Observación</td>
            <td><textarea type="text" name="planimetriaobservacion" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once "../../pie.php";?>