<?php
include_once("db2.php");
class anuncioslogin extends db{
	var $tabla="anuncioslogin";	
	function mostrarAnuncios(){
		$this->campos=array('*');
		return $this->getRecords("Activo=1");
	}
}
?>