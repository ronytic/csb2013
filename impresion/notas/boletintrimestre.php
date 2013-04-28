<?php
include_once("../../login/check.php");
if(!empty($_GET) && isset($_GET['mf']) && $_GET['mf']==md5("lock")){
	$CodCurso=$_GET['CodCurso'];
	$CodAlumno=$_GET['CodAlumno'];	
	include_once("../../class/config.php");
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	include_once("../../class/cursomateria.php");
	include_once("../../class/materias.php");
	include_once("../../class/casilleros.php");
	include_once("../../class/registronotas.php");
	include_once("../fpdf.php");
	$alumno=new alumno;
	$curso=new curso;
	$cursomateria=new cursomateria;
	$materias=new materias;
	$casilleros=new casilleros;
	$registronotas=new registronotas;
	$config=new configuracion;
	$pdf=new FPDF("P","mm","letter");//612,792
	$pdf->SetAutoPageBreak(true,15);
	$pdf->SetMargins(0,0,0);
	$pdf->AddPage();
	$pdf->SetFont("Arial","",11);
	$al=array_shift($alumno->mostrarDatos($CodAlumno));
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
	$trimestre=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("Anio"));
	$anio=$cnf['Valor'];
	//Sacar el Codigo del del trimestre desde ahi
	//Boletin
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion1X"));
	$boletin1x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion1Y"));
	$boletin1y=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion2X"));
	$boletin2x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion2Y"));
	$boletin2y=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion3X"));
	$boletin3x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion3Y"));
	$boletin3y=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion4X"));
	$boletin4x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion4Y"));
	$boletin4y=$cnf['Valor'];

	$bordeC=0;
	
	$pdf->SetXY($boletin1x+25,$boletin1y+48);
	$pdf->Cell(120,5,"Nombre : ".mb_strtoupper(utf8_decode($al['Paterno']." ".$al['Materno']." ".$al['Nombres'])),$bordeC);
	$pdf->SetXY($boletin1x+25,$boletin1y+53);
	$pdf->Cell(120,5,"Curso : ".utf8_decode($cur['Nombre']),$bordeC);
	$pdf->SetXY($boletin2x+145,$boletin2y+48);
	$pdf->Cell(30,5,utf8_decode("Gestión : ".$anio),$bordeC);
	$pdf->SetXY($boletin2x+145,$boletin2y+53);
	$pdf->Cell(50,5,utf8_decode("Fecha : ".strftime("%d de %B de %Y")),$bordeC);
	$i=0;
	foreach($cursomateria->mostrarMaterias($CodCurso) as $matbol){
		$mat=$materias->mostrarMateria($matbol['CodMateria']);
		$mat=array_shift($mat);
		$pdf->SetXY($boletin3x+15,$boletin3y+80+$i);
		if($matbol['Alterno']==1)
			$pdf->Cell(45,4,utf8_decode($mat['Nombre']),$bordeC);
		if($matbol['Alterno']==2)
			$pdf->Cell(45,4,utf8_decode($mat['NombreAlterno1']),$bordeC);
		if($matbol['Alterno']==3)
			$pdf->Cell(45,4,utf8_decode($mat['NombreAlterno2']),$bordeC);
		
		$cont=0;
		$sumanotas=0;
		
		$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($mat['CodMateria'],$CodCurso,$al['Sexo'],1));
		$regNotas=$registronotas->notasBoletin($CodAlumno,$casillas['CodCasilleros']);
		$regNotas=array_shift($regNotas);
		$sumanotas+=$regNotas['NotaFinal'];
		///Primer Trimestre
		if($trimestre>=1){
			$pdf->SetXY($boletin4x+63,$boletin4y+80+$i);
			$pdf->Cell(6,4,$regNotas['Resultado'],$bordeC,0,"R");//Nota
			$pdf->SetXY($boletin4x+75,$boletin4y+80+$i);
			if($casillas['Dps']==1)
			$pdf->Cell(6,4,$regNotas['Dps'],$bordeC,0,"R");//DPS
			$pdf->SetXY($boletin4x+86,$boletin4y+80+$i);
			$pdf->Cell(6,4,$regNotas['NotaFinal'],$bordeC,0,"R");//Puntaje Trimestral
			$cont++;
		}
			
		$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($mat['CodMateria'],$CodCurso,$al['Sexo'],2));
		$regNotas=$registronotas->notasBoletin($CodAlumno,$casillas['CodCasilleros']);
		$regNotas=array_shift($regNotas);
		$sumanotas+=$regNotas['NotaFinal'];
		//Segundo Trimestre
		if($trimestre>=2){
			$pdf->SetXY($boletin4x+95,$boletin4y+80+$i);
			$pdf->Cell(6,4,$regNotas['Resultado'],$bordeC,0,"R");//Nota
			//$pdf->Cell(6,4,"00",$bordeC,0,"R");
			$pdf->SetXY($boletin4x+106,$boletin4y+80+$i);
			if($casillas['Dps']==1)
			$pdf->Cell(6,4,$regNotas['Dps'],$bordeC,0,"R");//DPS
			//$pdf->Cell(6,4,"00",$bordeC,0,"R");
			$pdf->SetXY($boletin4x+116,$boletin4y+80+$i);
			$pdf->Cell(6,4,$regNotas['NotaFinal'],$bordeC,0,"R");//Puntaje Trimestral
			//$pdf->Cell(6,4,"00",$bordeC,0,"R");
			$cont++;
		}
		
		$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($mat['CodMateria'],$CodCurso,$al['Sexo'],3));
		$regNotas=$registronotas->notasBoletin($CodAlumno,$casillas['CodCasilleros']);
		$regNotas=array_shift($regNotas);
		$sumanotas+=$regNotas['NotaFinal'];
		///Tercer Trimestre
		if($trimestre>=3){
			$pdf->SetXY($boletin4x+127,$boletin4y+80+$i);
			$pdf->Cell(6,4,$regNotas['Resultado'],$bordeC,0,"R");//Nota
			//$pdf->Cell(6,4,"00",$bordeC,0,"R");
			$pdf->SetXY($boletin4x+138,$boletin4y+80+$i);
			if($casillas['Dps']==1)
			$pdf->Cell(6,4,$regNotas['Dps'],$bordeC,0,"R");//DPS
			//$pdf->Cell(6,4,"00",$bordeC,0,"R");
			$pdf->SetXY($boletin4x+148,$boletin4y+80+$i);
			$pdf->Cell(6,4,$regNotas['NotaFinal'],$bordeC,0,"R");//Puntaje Trimestral
			//$pdf->Cell(6,4,"00",$bordeC,0,"R");
			$cont++;
		}
		
		
		
		$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($mat['CodMateria'],$CodCurso,$al['Sexo'],4));
		$regNotas=array_shift($registronotas->notasBoletin($CodAlumno,$casillas['CodCasilleros']));
		$sumanotas+=$regNotas['NotaFinal'];
		$promediofinal=round($sumanotas/3);
		
		if($regNotas['Nota2']!=0){
			$promedioanual=round(($promediofinal+$regNotas['Nota2'])/2);	
		}else{
			$promedioanual=$promediofinal;	
		}
		
		if($cont==3){
		$pdf->SetXY(162,80+$i);
		$pdf->Cell(6,4,$promediofinal,$bordeC,0,"R");//Promedio Anual
		
		$pdf->SetXY(180,80+$i);
		$pdf->Cell(6,4,$regNotas['Nota2'],$bordeC,0,"R");//Reforzamiento
		
		$pdf->SetXY(198,80+$i);
		$pdf->Cell(6,4,$promedioanual,$bordeC,0,"R");//Promedio Final
		}
		$i+=4;//Salto para abajo
	}
	$pdf->Output();
}
?>