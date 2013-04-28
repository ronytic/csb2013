<?php
include_once("login/check.php");
include_once("class/casilleros.php");
include_once("class/registronotas.php");
$casilleros=new casilleros;
$registronotas=new registronotas;

if(count($casilleros->mostrarTodo("Trimestre=4"))==0){
	foreach($casilleros->mostrarTodo("Trimestre=3") as $cas){
		$casilla=$casilleros->estadoTabla();
		$CodCasilleros=$casilla['Auto_increment'];
		$valores=array("CodCasilleros"=>"$CodCasilleros",
					"CodDocenteMateriaCurso"=>$cas['CodDocenteMateriaCurso'],
					"Casilleros"=>4,
					"Trimestre"=>4,
					"FormulaCalificaciones"=>"'n1 n2 + 2 / n3 + n4 +'",
					"Dps"=>0,
					"NombreCasilla1"=>"'Nota Promedio Final'",
					"LimiteCasilla1"=>60,
					"NombreCasilla2"=>"'Nota Reforzamiento'",
					"LimiteCasilla2"=>60,
					"NombreCasilla3"=>"'Nota Adicional'",
					"LimiteCasilla3"=>60,
					"NombreCasilla4"=>"'Nota Adicional 2'",
					"LimiteCasilla4"=>60
				);	
		echo "<br />";
		//print_r($valores);
		$casilleros->insertar($valores);
		foreach($registronotas->mostrarTodo("CodCasilleros=".$cas["CodCasilleros"]) as $regnotas){
			$valores=array("CodCasilleros"=>$CodCasilleros,
						"Trimestre"=>4,
						"CodAlumno"=>$regnotas['CodAlumno']
					);	
			//		print_r($valores);
			echo "<br />";
			$registronotas->insertar($valores);
		}
	}

	
	/*
*/}
?>