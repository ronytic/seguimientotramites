<?php
include_once "../../login/check.php";
$folder = "../../";
$titulo = "Modificar Datos del Personal";
$Cod = $_GET['Cod'];

include_once "../../class/usuario.php";
$usu = new usuario;
$u = $usu->mostrarTodoRegistro("CodUsuario=" . $Cod);
$u = array_shift($u);

$Niveles = array("2" => "MAE", "3" => "Comisión/Unidad", "4" => "Recepción");

include_once "../../class/oficina.php";
$oficina = new oficina;
$of = todolista($oficina->mostrarTodoRegistro(), "codoficina", "nombre");

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod; ?>">
    <table class="table tables table-bordereds table-hovers">
        <tr class="">
            <td class="text-right">Oficina</td>
            <td>
                <?php
campo("CodOficina", "select", $of, "form-control", 0, "", 0, "", $u['CodOficina'], 1)
?>
            </td>
        </tr>
        <tr class="">
            <td class="text-right">Nivel de Acceso</td>
            <td><?php
campo("Nivel", "select", $Niveles, "form-control", 0, "", 0, "", $u['Nivel'], 1)
?></td>
        </tr>



        <tr class="">
            <td class="text-right">Nombres</td>
            <td><input type="text" name="Nombres" class="form-control"  value="<?=$u['Nombres'];?>" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Paterno</td>
            <td><input type="text" name="Paterno" class="form-control"  value="<?=$u['Paterno'];?>" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Materno</td>
            <td><input type="text" name="Materno" class="form-control"  value="<?=$u['Materno'];?>" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Cargo</td>
            <td><input type="text" name="Cargo" class="form-control"  value="<?=$u['Cargo'];?>" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Carnet</td>
            <td><input type="text" name="Ci" class="form-control"  value="<?=$u['Ci'];?>" required></td>
        </tr>
        <tr class="">
            <td class="text-right">Dirección</td>
            <td><input type="text" name="Direccion" class="form-control"  value="<?=$u['Direccion'];?>"></td>
        </tr>
        <tr class="">
            <td class="text-right">Telefono</td>
            <td><input type="text" name="Telefono" class="form-control"  value="<?=$u['Telefono'];?>"></td>
        </tr>
        <tr class="">
            <td class="text-right">Celular</td>
            <td><input type="text" name="Celular" class="form-control"  value="<?=$u['Celular'];?>"></td>
        </tr>
        <tr class="warning">
            <td colspan="2" class="text-center"><h5 class="text-warning">
                DATOS DE ACCESO AL SISTEMA
            </h5></td>
        </tr>
        <tr class="warning">
            <td class="text-right">Usuario</td>
            <td><input type="text" name="Usuario" class="form-control btn-"  value="<?=$u['Usuario'];?>" required></td>
        </tr>
        <tr class="warning">
            <td class="text-right">Contraseña</td>
            <td><input type="password" name="Pass" class="form-control btn-"  value=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-warning"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once "../../pie.php";?>