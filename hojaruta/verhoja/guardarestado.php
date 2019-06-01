<?php
include_once("../../login/check.php");

if(isset($_POST)){
    extract($_POST);

    include_once("../../class/hojaruta.php");
    $hojaruta=new hojaruta;


    $valores=array("estadodestino"=>"'$estado'",
                    "fechadestino"=>"'".date("Y-m-d")."'",
                    "horadestino"=>"'".date("H:i:s")."'",
                    );

    $hojaruta->actualizarRegistro($valores,"codhojaruta=".$codhojaruta);

}
header("location:ver.php?Cod=".$codhojaruta);
?>