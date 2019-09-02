<?php
include_once "../../login/check.php";
$folder = "../../";
$titulo = "Listado de Hojas de Rutas";

include_once "../../class/oficina.php";
$oficina = new oficina;
$of = todolista($oficina->mostrarTodoRegistro(), "codoficina", "nombre");

$Niveles = array("2" => "MAE", "3" => "Comisión/Unidad", "4" => "Recepción");

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table tables ">
        <tr>
            <td class="text-center text-bold">Nombres<br><input type="text" name="Nombres" class="form-control" autofocus></td>
            <td class="text-center text-bold">Paterno<br><input type="text" name="Paterno" class="form-control" ></td>
            <td class="text-center text-bold">Materno<br><input type="text" name="Materno" class="form-control" ></td>
            <td class="text-center">
                Oficina
                <?php
campo("CodOficina", "select", $of, "form-control", 0, "", 0, "", null, 1)
?>
            </td>
            <td class="text-center">
                Nivel de Acceso
                <?php
campo("Nivel", "select", $Niveles, "form-control", 0, "", 0, "", null, 1)
?>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Buscar" class="btn btn-warning"></td>
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
        <div class="col-lg-12 table-responsive" id="respuestaformulario">

        </div>
<?php include_once "../../pie.php";?>