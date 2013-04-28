<?php
include_once("db2.php");
class casilleros extends db{
	var $tabla="casilleros";
	function estadoTabla(){
		return $this->statusTable();
	}
	function insertarRegistro($Values){
		$this->insertRow($Values,1);
	}
	function mostrar($CodCasilleros){
		$this->campos=array("*");
		return $this->getRecords("CodCasilleros=$CodCasilleros");	
	}
	
/*	function mostrarDocenteMateriaAnio($CodCurso,$CodMateria){
		$this->campos=array("*");
		return $this->getRecords(" CodCurso=$CodCurso and CodMateria=$CodMateria");
	}
	function mostrarDocenteMaterias(){
		$this->campos=array("*");
		return $this->getRecords();
	}
	function mostrarCursoMateriaTrimestre($CodCurso,$CodMateria,$Trimestre){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso and CodMateria=$CodMateria and Trimestre=$Trimestre");
	}
	
	function mostrarDocenteCursoMateria($CodDocente,$CodCurso,$CodMateria,$Trimestre){
		$this->campos=array('*');
		return $this->getRecords("CodDocente=$CodDocente and CodCurso=$CodCurso and CodMateria=$CodMateria and Trimestre=$Trimestre");
	}
	*/
	function mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$Trimestre){
		$this->tabla="docentemateriacurso dmc, casilleros c";
		$this->campos=array('dmc.CodDocente,dmc.CodMateria,dmc.CodCurso,dmc.SexoAlumno,dmc.CodDocenteMateriaCurso,c.*');
		return $this->getRecords("dmc.CodDocente=$CodDocente and dmc.CodMateria=$CodMateria and dmc.CodCurso=$CodCurso and c.Trimestre=$Trimestre and dmc.CodDocenteMateriaCurso=c.CodDocenteMateriaCurso");
	}
	function mostrarMateriaCursoTrimestre($CodMateria,$CodCurso,$Trimestre){
		$this->tabla="docentemateriacurso dmc, casilleros c";
		$this->campos=array('dmc.CodDocente,dmc.CodMateria,dmc.CodCurso,dmc.SexoAlumno,dmc.CodDocenteMateriaCurso,c.*');
		return $this->getRecords("dmc.CodMateria=$CodMateria and dmc.CodCurso=$CodCurso and c.Trimestre=$Trimestre and dmc.CodDocenteMateriaCurso=c.CodDocenteMateriaCurso");
	}
	function mostrarMateriaCursoSexoTrimestre($CodMateria,$CodCurso,$SexoAlumno,$Trimestre){
		$this->tabla="docentemateriacurso dmc, casilleros c";
		$this->campos=array('dmc.CodDocente,dmc.CodMateria,dmc.CodCurso,dmc.SexoAlumno,dmc.CodDocenteMateriaCurso,c.*');
		return $this->getRecords("dmc.CodMateria=$CodMateria and dmc.CodCurso=$CodCurso and (dmc.SexoAlumno=$SexoAlumno or dmc.SexoAlumno=2) and c.Trimestre=$Trimestre and dmc.CodDocenteMateriaCurso=c.CodDocenteMateriaCurso");
	}
	function mostrarTrimestre($CodDocenteMateriaCurso,$Trimestre){
		$this->campos=array('*');
		return $this->getRecords("CodDocenteMateriaCurso=$CodDocenteMateriaCurso and Trimestre=$Trimestre");
	}
	function mostrarTodo($where=''){
		$this->campos=array('*');
		return $this->getRecords($where);
	}
	function actualizarCasilleros($values,$Cod){
		$this->updateRow($values,"CodCasilleros=$Cod");	
	}
}
?>