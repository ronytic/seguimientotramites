<?php
include_once "bd.php";
class submenu extends bd
{
    public $tabla = "submenu";
    public function mostrar($Nivel, $Menu)
    {
        $this->campos = array('Nombre', 'Url');
        switch ($Nivel) {
            case "1":{return $this->getRecords(" Admin=1 and CodMenu=$Menu and Activo=1", "Orden");}break;
            case "2":{return $this->getRecords(" JefeU=1 and CodMenu=$Menu and Activo=1", "Orden");}break;
            case "3":{return $this->getRecords(" Subdireccion=1 and CodMenu=$Menu and Activo=1", "Orden");}break;
            case "4":{return $this->getRecords(" Recepcion=1 and CodMenu=$Menu and Activo=1", "Orden");}break;
        }
    }
    public function verificar($Directorio, $Nivel)
    {
        switch ($Nivel) {
            case "1":{return $this->getRecords("Url='$Directorio' and Admin=1 and Activo=1", "Orden");}break;
            case "2":{return $this->getRecords("Url='$Directorio' and  JefeU=1 and Activo=1", "Orden");}break;
            case "3":{return $this->getRecords("Url='$Directorio' and  Subdireccion=1 and Activo=1", "Orden");}break;
            case "4":{return $this->getRecords("Url='$Directorio' and  Recepcion=1 and Activo=1", "Orden");}break;
        }
    }
}
