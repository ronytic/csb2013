<?php
include_once("../class/alumno.php");
$alumno=new alumno;
for($i=1;$i<=13;$i++){
	foreach($alumno->mostrarDatosWhere("CodCurso=$i")as $al){
		if($al['CiPadre']!=""){
			$usu=trim($al['CiPadre']);
			$values=array("UsuarioP"=>"'".$al['CiPadre']."'");
		}else{
			$usu=trim($al['CiMadre']);
			$values=array("UsuarioP"=>"'".$al['CiMadre']."'");
		}
		print_r($values);
		$alumno->actualizarAlumno($values,$al['CodAlumno']);
	}
}
//// ya corregido en el guardado de datos
?>