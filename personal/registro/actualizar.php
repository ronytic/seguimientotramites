<?php
include_once "../../login/check.php";
extract($_POST);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// // exit();
include_once "../../class/usuario.php";
$usu = new usuario;

$valores = array("CodOficina" => "'$CodOficina'",
    "Nivel" => "'$Nivel'",
    "Nombres" => "'$Nombres'",
    "Paterno" => "'$Paterno'",
    "Materno" => "'$Materno'",
    "Cargo" => "'$Cargo'",
    "Ci" => "'$Ci'",
    "Direccion" => "'$Direccion'",
    "Telefono" => "'$Telefono'",
    "Celular" => "'$Celular'",
    "Usuario" => "'$Usuario'",

    // "CodUsuarioRegistro"=>"'".$_SESSION['CodUsuarioLog']."'",
    // "NivelRegistro"=>"'".$_SESSION['Nivel']."'",
    // "FechaRegistro"=>"'".date("Y-m-d")."'",
    // "HoraRegistro"=>"'".date("H:i:s")."'",
    // "Activo"=>"'1'",
);
if ($Pass != "") {
    $valores["Pass"] = "SHA1('$Pass')";
}
$res = $usu->actualizarRegistro($valores, "CodUsuario=" . $cod);

//print_r($valores);
$titulo = "Mensaje de Confirmación";
if ($res) {
    $mensaje[] = "El personal fue modificado correctamente";
    $tipomensaje = "success";
} else {
    $mensaje[] = "Error al modificar el personal";
    $tipomensaje = "danger";
}
$folder = "../../";
include_once "respuesta.php";
