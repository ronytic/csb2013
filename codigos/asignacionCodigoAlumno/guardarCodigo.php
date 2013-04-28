<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
$alumno=new alumno;
$CodAlumno=$_POST['CodAlumno'];
$CodBarra=$_POST['CodBarra'];
$Values=array("CodBarra"=>"'$CodBarra'");
$alumno->actualizarAlumno($Values,$CodAlumno);
$al=$alumno->mostrarDatos($CodAlumno);
$al=array_shift($al);
echo "Codigo de Barra Actualizado para el alumno:<br><h1>";
echo ucwords($al['Paterno']." ".$al['Materno']." ".$al['Nombres'])."</h1><br>";
echo "con el codigo de barra:<h1>".$CodBarra."</h1>"
?>
