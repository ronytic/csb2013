<?php
include_once("db2.php");
class cuota extends db{
	var $tabla="cuota";
	
	function  mostrarCuotasWhere($tabla,$campos,$Where,$Order){
		if($tabla!=""){
			$this->tabla=$tabla;
		}
		$this->campos=array($campos);
		return $this->getRecords($Where,$Order);
	}
	function mostrarCuotas($CodAlumno){
		$this->campos=array('*');
		return $this->getRecords("CodAlumno=$CodAlumno","Numero");
	}
	function mostrarCuotasArqueo(){
			
	}
	function actualizar($CodCuota,$Valor,$Factura,$Observaciones,$Fecha){
		$this->campos=array('Cancelado','Factura','Observaciones','Fecha');
		$this->updateRecord("CodCuota=$CodCuota",array($Valor,$Factura,$Observaciones,"$Fecha"))	;
	}
	function guardar($Values){
			$this->insertRow($Values,1);
	}
	function actualizarCuota($values,$where){
		$this->updateRow($values,$where);	
	}
}
?>