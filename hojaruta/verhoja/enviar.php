<?php
include_once("../../login/check.php");
// echo "asd";
// exit();
if(isset($_POST)){
    extract($_POST);

    include_once("../../class/hojaruta.php");
    $hojaruta=new hojaruta;


    $valores=array(
                    "codoficinadestino"=>"'".$codoficinadestino."'",
                    "estadodestino"=>"'0'",
                    "fechadestino"=>"'0000-00-00'",
                    "horadestino"=>"'00:00:00'",

                    "codoficinaorigen"=>"'".$_SESSION['CodOficina']."'",
                    "estadoorigen"=>"'1'",
                    "fechaorigen"=>"'".date("Y-m-d")."'",
                    "horaorigen"=>"'".date("H:i:s")."'",
                    );

    $hojaruta->actualizarRegistro($valores,"codhojaruta=".$codhojaruta);

}
header("location:ver.php?Cod=".$codhojaruta);
?>