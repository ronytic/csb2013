<?php
include_once("class/casilleros.php");
include_once("class/alumno.php");
include_once("class/registronotas.php");
$docMat=new docentemateria;
$alumno=new alumno;
$regNotas=new registronotas;
$Fecha=date("Y-m-d");
$Hora=date("H:i:s");
foreach($docMat->mostrarDocenteMaterias() as $DM){
	foreach($alumno->mostrarAlumnosCurso($DM['CodCurso'],$DM['SexoAlumno']) as $al){
		$val=array("CodRegistroNotas"=>'NULL',
					"CodDocenteMateria"=>$DM['CodDocenteMateria'],
					"CodAlumno"=>$al['CodAlumno'],
					"Trimestre"=>$DM['Trimestre']
					
		);
		for($i=1;$i<=15;$i++){
			$val['Nota'.$i]=0;
		}
		$val['Dps']=0;
		$val['NotaFinal']=0;
		$val['FechaRegistro']="'$Fecha'";
		$val['HoraRegistro']="'$Hora'";
		//print_r($val);
		//$regNotas->insertarRegistro($val);
		echo "<br>";
	}
}
?>
<a href="http://movies.apple.com/media/us/ipad/2012/80ba527a-1a34-4f70-aae8-14f87ab76eea/tours/apple-ipad-feature-us-20120307_r848-9dwc-hls.mov?width=848&height=480">asd</a>