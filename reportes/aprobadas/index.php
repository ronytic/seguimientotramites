<?php
include_once "../../login/check.php";
$folder = "../../";
$titulo = "Reporte de Resoluciones Aprobadas";

include_once "../../class/oficina.php";
$oficina = new oficina;
$codoficina = $_SESSION['CodOficina'];
$of = todolista($oficina->mostrarTodoRegistro("codoficina!=$codoficina"), "codoficina", "nombre");

$est = array("0" => "Pendiente", "1" => "Revisado");
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table tables ">
        <tr>
            <td class="text-center">
            Tipo de Documento
                <select name="tipodocumento" class="form-control" >
                    <option value="">Seleccionar Tipo de Documento</option>
                    <option value="contrato">Contrato</option>
                    <option value="planimetria">Planimetria</option>
                    <option value="otros">Otros</option>
                </select></td>
            <td class="text-center">
                Desde Fecha
                <?php
campo("fechadesde", "date", date("Y-m-d"), "form-control", 0, "", 0, "", null, 1)
?>
            </td>
            <td class="text-center">
                Hasta Fecha
                <?php
campo("fechahasta", "date", date("Y-m-d"), "form-control", 0, "", 0, "", null, 1)
?>
            </td>

            <td><br><input type="submit" value="Buscar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
        </div>
        </div>
    </div>
</div>
<div class="hpanel">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
        <div class="row">
        <div class="col-lg-12" id="respuestaformulario">

        </div>
<?php include_once "../../pie.php";?>