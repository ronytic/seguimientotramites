<?php
include_once("../../login/check.php");
extract($_POST);

include_once("../../class/usuario.php");
$us=new usuario;

$valores=array("CodOficina"=>"'$CodOficina'",
            "Nivel"=>"'$Nivel'",
            "Nombres"=>"'$Nombres'",
            "Paterno"=>"'$Paterno'",
            "Materno"=>"'$Materno'",
            "Cargo"=>"'$Cargo'",
            "Ci"=>"'$Ci'",
            "Direccion"=>"'$Direccion'",
            "Telefono"=>"'$Telefono'",
            "Celular"=>"'$Celular'",
            "Usuario"=>"'$Usuario'",
            "Pass"=>"MD5('$Pass')",
            "CodUsuarioRegistro"=>"'".$_SESSION['CodUsuarioLog']."'",
            "NivelRegistro"=>"'".$_SESSION['Nivel']."'",
            "FechaRegistro"=>"'".date("Y-m-d")."'",
            "HoraRegistro"=>"'".date("H:i:s")."'",
            "Activo"=>"'1'",
        );


$res=$us->insertarRegistro($valores,0);

$folder="../../";
$titulo="Mensaje de Confirmación";
if($res){
    $mensaje[]="El Personal fue registrado correctamente";
    $tipomensaje="success";
}else{
    $mensaje[]="Error al registrar el Personal";
    $tipomensaje="danger";
}

include_once("respuesta.php");
?>