<?php
include_once("db2.php");
class agenda extends db{
	var $tabla="agenda";
	function insertarRegistro($Values){
		return $this->insertRow($Values,1);
	}
	function mostrarRegistroCurso($CodDocente,$CodCurso){
		$this->campos=array("*");	
		return $this->getRecords("CodUsuario=$CodDocente and CodCurso=$CodCurso and Visible=1"," FechaRegistro,HoraRegistro",0,0,0,1);
	}
	function mostrarRegistroMateria($CodDocente,$CodCurso,$Materia){
		$this->campos=array("*");	
		return $this->getRecords("CodUsuario=$CodDocente and CodCurso=$CodCurso and CodMateria=$Materia and Visible=1"," FechaRegistro",0,0,0,1);
	}
	function mostrarRegistroAlumno($CodDocente,$CodCurso,$Materia,$CodAlumno){
		$this->campos=array("*");	
		return $this->getRecords("CodUsuario=$CodDocente and CodCurso=$CodCurso and CodMateria=$Materia and CodAlumno=$CodAlumno and Visible=1"," FechaRegistro DESC,HoraRegistro",0,0,0,1);
	}
	function mostrarCodMateriaCodAlumno($CodMateria,$CodAlumno){
		$this->campos=array("*");	
		return $this->getRecords("CodMateria=$CodMateria and CodAlumno=$CodAlumno and Visible=1"," FechaRegistro DESC,HoraRegistro",0,0,0,1);
	}
	function mostrarCodMateriaCodAlumnoRango($CodMateria,$CodAlumno,$Inicio,$Fin){
		$this->campos=array("*");	
		return $this->getRecords("CodMateria=$CodMateria and CodAlumno=$CodAlumno and Visible=1 and Fecha BETWEEN '$Inicio' and  '$Fin'"," FechaRegistro DESC,HoraRegistro",0,0,0,1);
	}
	function mostrarCodCursoCodObservacionCodAlumnoRango($CodCurso,$CodObservacion,$CodAlumno,$Inicio,$Fin){
		$this->campos=array("count(*) as Cantidad");	
		return $this->getRecords("CodCurso=$CodCurso and CodObservacion=$CodObservacion and CodAlumno=$CodAlumno and Visible=1 and Fecha BETWEEN '$Inicio' and  '$Fin'"," FechaRegistro DESC,HoraRegistro",0,0,0,1);
	}
	function mostrarRegistros($CodAlumno){
		$this->campos=array("*");
		return $this->getRecords("CodAlumno=$CodAlumno and Visible=1","Fecha",0,0,0,1);
	}
	function CantidadObservaciones($CodAlumno,$CodObservaciones){
		$this->campos=array("count(*) as Cantidad");
		return $this->getRecords("CodObservacion IN($CodObservaciones) and Visible=1 and CodAlumno=$CodAlumno");
	}
	function actualizarAgendaE($values,$where){
		$this->updateRow($values,$where);	
	}
}
?>