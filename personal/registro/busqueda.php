<?php
include_once("../../login/check.php");
extract($_POST);

$CodOficina=$CodOficina!=""?$CodOficina:"%";
$Nivel=$Nivel!=""?$Nivel:"%";


include_once("../../class/usuario.php");
$usuario=new usuario;

include_once("../../class/oficina.php");
$oficina=new oficina;

$usu=$usuario->mostrarTodoRegistro("Nivel!=1 and Nombres LIKE '$Nombres%' and Paterno LIKE '$Paterno%' and Materno LIKE '$Materno%' and CodOficina LIKE '$CodOficina' and Nivel LIKE '$Nivel'",1,"");
// echo "<pre>";
// print_r($hojar);
// echo "</pre>";
// listadotabla(array("nombre"=>"Nombre","telefonos"=>"Teléfonos","descripcion"=>"Descripción"),$ofi,1,"","modificar.php","eliminar.php");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th width="10">N</th>
        <th>Nombres</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Oficina</th>
        <th>Nivel de Acceso</th>
    </tr>
</thead>
<?php
    $i=0;
    foreach($usu as $u){$i++;

        $of=$oficina->mostrarTodoRegistro("codoficina=".$u['CodOficina']);
        $of=array_shift($of);

        switch($u['Nivel']){
            case '1':{$nivelacceso="Admin";}break;
            case '2':{$nivelacceso="MAE";}break;
            case '3':{$nivelacceso="SubDirección";}break;
            case '4':{$nivelacceso="Recepción";}break;
        }
        ?>
        <tr>
        <td width="10"><?=$i;?></td>
        <td><?=$u['Nombres'];?></td>
        <td><?=$u['Paterno'];?></td>
        <td><?=$u['Materno'];?></td>
        <td><?=$of['nombre'];?></td>
        <td><?=$nivelacceso;?></td>
        <td>
            <a href="modificar.php?Cod=<?=$u['CodUsuario'];?>" class="btn btn-warning btn-xs">Modificar</a>
        </td>
        <td>
            <a href="eliminar.php?Cod=<?=$u['CodUsuario'];?>" class="btn btn-danger btn-xs eliminar">Eliminar</a>
        </td>
        </tr>
        <?php
    }
?>
<tr>
</tr>
</table>