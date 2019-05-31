<?php

include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
    <div class="alert alert-<?=$tipomensaje;?>">
        <ul>
            <?php
            if (isset($mensaje)) {
                foreach($mensaje as $m){
                    ?>
                    <li>
                        <h3><?=$m;?></h3>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>

    </div>
    <br>
    <a href="./" class="btn btn-warning">Registrar Nueva Hoja de Ruta</a>
    <a href="./listar.php" class="btn btn-danger">Listado de Hojas de Ruta</a>
    <a href="./reporte.php?cod=<?=$codigohojaruta;?>" class="btn btn-info">Ver Reporte</a>
</div>
<?php include_once($folder."pie.php");?>