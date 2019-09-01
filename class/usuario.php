<?php
include_once "bd.php";
class usuario extends bd
{
    public $tabla = "usuario";
    public function mostrarDatos($CodUsuario)
    {
        $this->campos = array("*");
        return $this->getRecords("CodUsuario=$CodUsuario and Activo=1");
    }
    public function mostrarUsuarios($menos = "")
    {
        $menos = $menos ? "$menos and " : '';
        $this->campos = array("*");
        return $this->getRecords("$menos Activo=1", "Paterno,Materno,Nombres");
    }
    public function actualizarDatos($valores, $CodUsuario)
    {
        //print_r($valores);
        return $this->updateRow($valores, "CodUsuario=$CodUsuario");
    }

    public function loginUsuarios($Usuario, $Password)
    {
        $this->campos = array("count(*) as Can,CodUsuario,Nivel,CodOficina");
        return $this->getRecords("Usuario='$Usuario' and Pass=SHA1('$Password') and Activo=1");
    }
}
