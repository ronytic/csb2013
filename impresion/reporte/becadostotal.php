<?php 
include_once("../../login/check.php");
	include_once("../pdf.php");
	$titulo="TODOS LOS BECADOS";
	class PDF extends PPDF{
		function Cabecera(){
			$this->Pagina();
			$this->ln();
			$this->TituloCabecera(15,"Nº");
			$this->TituloCabecera(70,"Nombre Completo");
			$this->TituloCabecera(30,"Curso");
			$this->TituloCabecera(30,"Monto Beca");
		}
		
	}
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	$curso=new curso;
	$alumno=new alumno;
	
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->AddPage();
	$i=0;
	foreach($alumno->mostrarDatosCursoTotalBecado() as $al){
		$i++;
		$CursoTexto=array_shift($curso->mostrarCurso($al['CodCurso']));
		if($i%2==0){$relleno=1;}else{$relleno=0;}
		$pdf->CuadroCuerpo(15,$i,$relleno,"R");
		$pdf->CuadroNombre(70,$al['Paterno'],$al['Materno'],$al['Nombres'],1,$relleno);
		$pdf->CuadroCuerpo(30,$CursoTexto['Nombre'],$relleno);
		$pdf->CuadroCuerpo(30,number_format($al['MontoBeca'],2),$relleno);
		$pdf->ln();
	}
	$pdf->Output();
?>