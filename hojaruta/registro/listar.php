<?php
include_once "../../login/check.php";
$folder = "../../";
$titulo = "Listado de Hojas de Rutas";

include_once "../../class/oficina.php";
$oficina = new oficina;
$of = todolista($oficina->mostrarTodoRegistro(), "codoficina", "nombre");

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table tables ">
        <tr>
            <td class="text-center text-bold">Nº de Hoja de Ruta<br><input type="text" name="nrohoja" class="form-control" autofocus></td>
            <td class="text-center">
            Tipo de Documento
                <select name="tipodocumento" class="form-control" >
                    <option value="">Seleccionar Tipo de Documento</option>
                    <option value="contrato">Contrato</option>
                    <option value="planimetria">Planimetria </option>
                    <option value="otros">Otros </option>
                </select></td>
            <td class="text-center">
                Oficina Origen
                <?php
campo("codoficinaorigen", "select", $of, "form-control", 0, "", 0, "", null, 1)
?>
            </td>
            <td class="text-center">
                Oficina Destino
                <?php
campo("codoficinadestino", "select", $of, "form-control", 0, "", 0, "", null, 1)
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