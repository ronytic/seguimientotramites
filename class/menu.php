<?php
include_once("bd.php");
class menu extends bd{
	var $tabla="menu";
	function mostrar($Nivel,$Posicion=""){
		$this->campos=array('CodMenu','Nombre','Url','SubMenu','Imagen',"Orden");
		$Posicion=(!empty($Posicion))?" and Posicion='$Posicion'":"";
		switch($Nivel){
			case "1":{return $this->getRecords(" Admin=1 and Activo=1 $Posicion","Orden");}break;
			case "2":{return $this->getRecords(" Mae=1 and Activo=1 $Posicion","Orden");}break;
			case "3":{return $this->getRecords(" Subdireccion=1 and Activo=1 $Posicion","Orden");}break;
			case "4":{return $this->getRecords(" Recepcion=1 and Activo=1 $Posicion","Orden");}break;
		}
	}
	function verificar($Directorio,$Nivel){
		switch($Nivel){
			case "1":{return $this->getRecords("Url='$Directorio' and Admin=1 and Activo=1","Orden");}break;
			case "2":{return $this->getRecords("Url='$Directorio' and  Mae=1 and Activo=1","Orden");}break;
			case "3":{return $this->getRecords("Url='$Directorio' and  Subdireccion=1 and Activo=1","Orden");}break;
			case "4":{return $this->getRecords("Url='$Directorio' and  Recepcion=1 and Activo=1","Orden");}break;
		}
	}
}
?>