<?php
include_once("db2.php");
class menu extends db{
	var $tabla="menu";
	function mostrar($Nivel){
		$this->campos=array('CodMenu','Nombre','Url','SubMenu','Imagen');
		switch($Nivel){
			case "1":{return $this->getRecords(" Admin=1 and Activo=1","Orden");}break;
			case "2":{return $this->getRecords(" Director=1 and Activo=1","Orden");}break;
			case "3":{return $this->getRecords(" Profesor=1 and Activo=1","Orden");}break;
			case "4":{return $this->getRecords(" Secretaria=1 and Activo=1","Orden");}break;
			case "5":{return $this->getRecords(" Regente=1 and Activo=1","Orden");}break;
			case "6":{return $this->getRecords(" Padre=1 and Activo=1","Orden");}break;
			case "7":{return $this->getRecords(" Alumno=1 and Activo=1","Orden");}break;
		}

	}
	
	
}
?>