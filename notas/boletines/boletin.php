<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodAlumno= $_POST['CodAlumno'];
	$CodCurso=$_POST['CodCurso'];
	include_once("../../class/curso.php");
	$curso=new curso;
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	if($cur['Bimestre']==1){
		$nombrearchivo="boletinbimestre.php";
	}else{
		$nombrearchivo="boletintrimestre.php";	
	}
	$url="../../impresion/notas/$nombrearchivo?CodAlumno=$CodAlumno&CodCurso=$CodCurso&mf=". md5("lock");
	?>
   
    <a href="<?php echo $url;?>" class="boton corner-all">Boletin en grande</a> <a href="#" class="botonSec" id="registrarimpresion">Registrar Impresión</a>
    <hr />
    <iframe width="100%" height="600" src="<?php echo $url;?>"></iframe>
    <div id="respuestaimpresiones"></div>
    <?php
}
?>