<?php
include_once("db2.php");
class docente extends db{
	var $tabla="docente";

	function estadoTabla(){
		return $this->statusTable();
	}
	function listar(){
		$this->campos=array('*');
		return $this->getRecords("Activo=1","Paterno, Materno, Nombres");
	}
	function mostrarDocente($CodDocente){
		$this->campos=array('CodDocente,LOWER(Paterno) as Paterno,LOWER(Materno) as Materno,LOWER(Nombres) as Nombres');
		return $this->getRecords(" CodDocente=$CodDocente","Paterno,Materno,Nombres");
	}
	function mostrarDocenteUsuario($CodUsuario){
			$this->campos=array("*");
			return $this->getRecords(" CodUsuario=$CodUsuario");
	}
	function loginDocente($Usuario,$Password){
		$this->campos=array("count(*) as Can,CodDocente as CodUsuario");	
		return $this->getRecords("Usuario='$Usuario' and Password='$Password'");
	}
	function actualizarDocente($values,$where){
		$this->updateRow($values,$where);	
	}
}
?>