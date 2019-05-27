<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Oficina";
$Cod=$_GET['Cod'];
include_once("../../class/oficina.php");
$oficina=new oficina;
$of=$oficina->mostrarRegistro($Cod);
$of=array_shift($of);
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table tables ">
        <tr>
            <td class="text-right">Nombre</td>
            <td><input type="text" name="nombre" class="form-control" autofocus value="<?php echo $of['nombre']?>"></td>
        </tr>
        <tr>
            <td class="text-right">Teléfonos</td>
            <td><input type="text" name="telefonos" class="form-control" autofocus value="<?php echo $of['telefonos']?>"></td>
        </tr>
        <tr>
            <td class="text-right">Descripción</td>
            <td><textarea name="descripcion" class="form-control"><?php echo $of['descripcion']?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>