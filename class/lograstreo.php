<?php
include_once("db2.php");
class lograstreo extends db{
	var $tabla="lograstreo";

	function mostrar($CodLogRastreo){
		$this->campos=array('*');
		return $this->getRecords(" CodLogRastreo=$CodLogRastreo","",0,0,0,1);
	}
	
}
?>