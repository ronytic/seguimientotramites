<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registro de Nueva Oficina";

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="table tables table-bordereds table-hovers">
        <tr>
            <td class="text-right">Nombre</td>
            <td><input type="text" name="nombre" class="form-control" autofocus></td>
        </tr>
        <tr>
            <td class="text-right">Teléfonos</td>
            <td><input type="text" name="telefonos" class="form-control" ></td>
        </tr>
        <tr>
            <td class="text-right">Descripción </td>
            <td><textarea name="descripcion" class="form-control"></textarea></td>
        </tr>



        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>