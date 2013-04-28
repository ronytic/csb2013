<?php 
include_once("../../login/check.php");
if(!empty($_GET) && $_GET['lock']==md5('lock')){
	include_once("../pdf.php");
	$titulo="ALUMNOS BECADOS";
	class PDF extends PPDF{
		function Cabecera(){
			global $CursoTexto;
			$this->CuadroCabecera(15,"Curso:",40,$CursoTexto['Nombre']);
			$this->Pagina();
			$this->ln();
			$this->TituloCabecera(15,"Nº");
			$this->TituloCabecera(60,"Nombre Completo");
			$this->TituloCabecera(30,"Monto Beca");
		}
		
	}
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	$curso=new curso;
	$alumno=new alumno;
	
	$CodCurso=$_GET['CodCurso'];
	$cur=$curso->mostrarCurso($CodCurso);
	$CursoTexto=array_shift($cur);
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->AddPage();
	$i=0;
	foreach($alumno->mostrarDatosWhere("MontoBeca!=0 and CodCurso=$CodCurso") as $al){
		$i++;
		if($i%2==0){$relleno=1;}else{$relleno=0;}
		$pdf->CuadroCuerpo(15,$i,$relleno,"R");
		$pdf->CuadroNombre(60,$al['Paterno'],$al['Materno'],$al['Nombres'],1,$relleno);
		$pdf->CuadroCuerpo(30,number_format($al['MontoBeca'],2),$relleno,"R");
		$pdf->ln();
	}
	$pdf->Output();
}
?>