<?php
include_once("../../login/check.php");
extract($_POST);

$nrohoja=$nrohoja!=""?$nrohoja:"%";
$tipodocumento=$tipodocumento!=""?$tipodocumento:"%";
$codoficinaorigen=$codoficinaorigen!=""?$codoficinaorigen:"%";
$codoficinadestino=$_SESSION['CodOficina'];

include_once("../../class/hojaruta.php");
$hojaruta=new hojaruta;

include_once("../../class/oficina.php");
$oficina=new oficina;

$hojar=$hojaruta->mostrarTodoRegistro("codhojaruta LIKE '$nrohoja' and tipodocumento LIKE '$tipodocumento' and codoficinaorigen LIKE '$codoficinaorigen' and codoficinadestino LIKE '$codoficinadestino' and estadodestino=$estado",1,"");
// echo "<pre>";
// print_r($hojar);
// echo "</pre>";
// listadotabla(array("nombre"=>"Nombre","telefonos"=>"Teléfonos","descripcion"=>"Descripción"),$ofi,1,"","modificar.php","eliminar.php");
// echo $_SESSION['CodOficina'];
if(count($hojar)==0){
    die("No se encontraron hojas de rutas con el criterio buscado");
}
?>
<table class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th width="10">N</th>
        <th>Nro hoja de Ruta</th>
        <th>Tipo de Documento</th>
        <th>Oficina Origen</th>
        <th>Fecha de Envio</th>
        <th>Oficina Destino</th>
        <th>Fecha de Recepción</th>
        <th>Estado</th>
    </tr>
</thead>
<?php

    $i=0;
    foreach($hojar as $hr){$i++;

        $ofo=$oficina->mostrarTodoRegistro("codoficina=".$hr['codoficinaorigen']);
        $ofo=array_shift($ofo);
        $ofd=$oficina->mostrarTodoRegistro("codoficina=".$hr['codoficinadestino']);
        $ofd=array_shift($ofd);
        switch($hr['tipodocumento']){
            case 'planimetria':{$tipodoc="Planimetria";}break;
            case 'contrato':{$tipodoc="Contrato";}break;
        }
        switch($hr['estadodestino']){
            case 0:{$estadodestino="Pendiente";}break;
            case 1:{$estadodestino="Confirmado Recepción";}break;
        }
        ?>
        <tr>
        <td width="10"><?=$i;?></td>
        <td class="text-right"><?=$hr['codhojaruta'];?></td>
        <td><?=$tipodoc;?></td>
        <td><?=$ofo['nombre'];?></td>
        <td><?=$hr['fechaorigen'];?></td>
        <td><?=$ofd['nombre'];?></td>
        <td><?=$hr['fechadestino'];?></td>
        <td><span class="badge badge-default"><?=$estadodestino;?></span></td>
        <td>
            <a href="ver.php?Cod=<?=$hr['codhojaruta'];?>" class="btn btn-info btn-xs">Ver Hoja de Ruta</a>
        </td>
        <td>
            <a href="reporte.php?Cod=<?=$hr['codhojaruta'];?>" class="btn btn-danger btn-xs">Ver Reporte</a>
        </td>
        </tr>
        <?php
    }
?>
<tr>
</tr>
</table>