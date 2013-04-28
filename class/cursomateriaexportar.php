<?php
include_once("db2.php");
class cursomateriaexportar extends db{
	var $tabla="cursomateriaexportar";
	function insertarMateria($data){
		$this->insertRow($data,1);
	}
	function mostrarMaterias($CodCurso){
		$this->campos=array("*");
		return $this->getRecords("CodCurso=".$CodCurso." and Activo=1","CodCursoMateriaExportar");
	}
	function cambiarNombre($Numero,$where){
		$this->updateRow(array("Alterno"=>$Numero),$where);
	}
	function actualizar($where){
		$this->updateRow(array("Activo"=>0),$where);
	}
}
?>