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
        <a href="./" class="btn btn-warning">Registrar Nuevo Tipo de Documento</a>
        <a href="./listar.php" class="btn btn-danger">Listado de Tipos de Documento</a>
    </div>
</div>
<?php include_once($folder."pie.php");?>