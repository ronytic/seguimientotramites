<?php
include_once "../../login/check.php";
$folder = "../../";

include_once "../../class/oficina.php";
$oficina = new oficina;
$of = todolista($oficina->mostrarTodoRegistro(), "codoficina", "nombre");

$Niveles = array("2" => "MAE", "3" => "Comisión/Unidad", "4" => "Recepción");

$titulo = "Registro de Nuevo Personal";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// exit();
include_once "../../cabecerahtml.php";
?>


<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <form action="guardar.php" method="post" enctype="multipart/form-data" >
    <table class="table tables table-bordereds table-hovers">
        <tr class="">
            <td class="text-right">Oficina</td>
            <td>
                <?php
campo("CodOficina", "select", $of, "form-control", 0, "", 0, "", null, 1)
?>
            </td>
        </tr>
        <tr class="">
            <td class="text-right">Nivel de Acceso</td>
            <td><?php
campo("Nivel", "select", $Niveles, "form-control", 0, "", 0, "", null, 1)
?></td>
        </tr>



        <tr class="">
            <td class="text-right">Nombres</td>
            <td><input type="text" name="Nombres" class="form-control"  value="" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Paterno</td>
            <td><input type="text" name="Paterno" class="form-control"  value="" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Materno</td>
            <td><input type="text" name="Materno" class="form-control"  value="" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Cargo</td>
            <td><input type="text" name="Cargo" class="form-control"  value="" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Carnet</td>
            <td><input type="text" name="Ci" class="form-control"  value="" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Dirección</td>
            <td><input type="text" name="Direccion" class="form-control"  value=""></td>
        </tr>
        <tr class="">
            <td class="text-right">Telefono</td>
            <td><input type="text" name="Telefono" class="form-control"  value=""></td>
        </tr>
        <tr class="">
            <td class="text-right">Celular</td>
            <td><input type="text" name="Celular" class="form-control"  value=""></td>
        </tr>
        <tr class="warning">
            <td colspan="2" class="text-center"><h5 class="text-warning">
                DATOS DE ACCESO AL SISTEMA
            </h5></td>
        </tr>
        <tr class="warning">
            <td class="text-right">Usuario</td>
            <td><input type="text" name="Usuario" class="form-control btn-"  value="" required></td>
        </tr>
        <tr class="warning">
            <td class="text-right">Contraseña</td>
            <td><input type="password" name="Pass" class="form-control btn-"  value="" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once "../../pie.php";?>