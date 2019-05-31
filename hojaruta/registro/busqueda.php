<?php
include_once("../../login/check.php");
extract($_POST);

$nrohoja=$nrohoja!=""?$nrohoja:"%";
$tipodocumento=$tipodocumento!=""?$tipodocumento:"%";
$codoficinaorigen=$codoficinaorigen!=""?$codoficinaorigen:"%";
$codoficinadestino=$codoficinadestino!=""?$codoficinadestino:"%";

include_once("../../class/hojaruta.php");
$hojaruta=new hojaruta;

include_once("../../class/oficina.php");
$oficina=new oficina;

$hojar=$hojaruta->mostrarTodoRegistro("codhojaruta LIKE '$nrohoja' and tipodocumento LIKE '$tipodocumento' and codoficinaorigen LIKE '$codoficinaorigen' and codoficinadestino LIKE '$codoficinadestino'",1,"");
// echo "<pre>";
// print_r($hojar);
// echo "</pre>";
// listadotabla(array("nombre"=>"Nombre","telefonos"=>"Teléfonos","descripcion"=>"Descripción"),$ofi,1,"","modificar.php","eliminar.php");
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
        <th>Fecha de Destino</th>
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
        ?>
        <tr>
        <td width="10"><?=$i;?></td>
        <td class="text-right"><?=$hr['codhojaruta'];?></td>
        <td><?=$tipodoc;?></td>
        <td><?=$ofo['nombre'];?></td>
        <td><?=$hr['fechaorigen'];?></td>
        <td><?=$ofd['nombre'];?></td>
        <td><?=$hr['fechadestino'];?></td>
        <td>
            <a href="modificar.php?Cod=<?=$hr['codhojaruta'];?>" class="btn btn-warning btn-xs">Modificar</a>
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