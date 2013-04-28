<?php
include_once("class/alumno.php");
$alumno=new alumno;
for($i=1;$i<=13;$i++){
	foreach($alumno->mostrarDatosWhere("CodCurso=$i") as $al){

		if($al['CiPadre']!="" && !ereg("---*",$al['CiPadre'])){
			$usuarioP=$al['CiPadre'];
			$usuarioP=trim($usuarioP);
		}else{
			$usuarioP=$al['CiMadre'];
			$usuarioP=trim($usuarioP);
		}
		$usuario=mb_strtolower($usuarioP);
		$dato='';
		for($j=0;$j<=strlen($usuario);$j++){
			if(ereg("[0-9]",$usuario[$j]))
			$dato.=$usuario[$j];
		}
		$alumno->actualizarAlumno(array("UsuarioPadre"=>"'$dato'"),$al['CodAlumno']);
	}
}

?>