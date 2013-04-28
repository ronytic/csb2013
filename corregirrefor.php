<?php
include_once("login/check.php");
include_once("class/casilleros.php");
include_once("class/registronotas.php");
include_once("class/docentemateriacurso.php");
$casilleros=new casilleros;
$docentemateriacurso=new docentemateriacurso;
$registronotas=new registronotas;
/*foreach($casilleros->mostrarTodo("CodCasilleros  IN (471,472,473)") as $cas){
	$docmat=array_shift($docentemateriacurso->mostrar($cas['CodDocenteMateriaCurso']));
	//print_r($cas);
	//echo "<br>";
	//print_r($docmat);
}*/
foreach($registronotas->mostrarTodo("CodCasilleros=317 ") as $regnota){
	//print_r($regnota);
	$valores=array("CodCasilleros"=>473,
					"CodAlumno"=>$regnota['CodAlumno'],
					"Trimestre"=>4
	);
	print_r($valores);
	//$registronotas->insertarRegistro($valores);
	echo "<br>";
}
?>