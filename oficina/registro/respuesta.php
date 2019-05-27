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
        <a href="./" class="btn btn-warning">Registrar Nueva Oficina</a>
        <a href="./listar.php" class="btn btn-danger">Listado de Oficinas</a>
    </div>
</div>
<?php include_once($folder."pie.php");?>