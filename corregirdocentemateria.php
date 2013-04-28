<?php 
include_once 'class/casilleros.php';
include_once 'class/docentemateriacurso.php';
$docentemateria=new docentemateria;
$docentemateriacurso=new docentemateriacurso;
$i=0;
foreach($docentemateria->mostrarTodo("") as $dm){
	$dmc=$docentemateriacurso->mostrarTodo("CodDocente=$dm[CodDocente] and CodMateria=$dm[CodMateria] and CodCurso=$dm[CodCurso] and SexoAlumno=$dm[SexoAlumno]");
	$cant=count($dmc);
	if ($cant==1) {
		$i++;
		$dmc=array_shift($dmc);
		$sql="UPDATE docentemateria SET CodDocenteMateriaCurso=$dmc[CodDocenteMateriaCurso] WHERE CodDocenteMateria=$dm[CodDocenteMateria]";
//		$sql="UPDATE docentemateria SET Activo=1,CodUsuario=1,FechaRegistro='2012-10-15',HoraRegistro='13:00:00'";
		//$sql="INSERT INTO docentemateriacurso (CodDocente,CodMateria,CodCurso,SexoAlumno,CodUsuario,FechaRegistro,HoraRegistro,Activo) VALUES($dm[CodDocente],$dm[CodMateria],$dm[CodCurso],$dm[SexoAlumno],1,'2012-10-15','13:00:00',1)";
		mysql_query($sql);
		echo $sql;
		//mysql_query($sql);
		?>

	<br>
	<?php 
	}
		
}
 ?>