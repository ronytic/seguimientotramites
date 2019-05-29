<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Tipos de Documentos";

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table tables ">
        <tr>
            <td class="text-center text-bold">Nombre<br><input type="text" name="nombre" class="form-control" autofocus></td>
            <td class="text-center">Descripción<input type="text" name="descripcion" class="form-control"></td>
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
<?php include_once("../../pie.php");?>