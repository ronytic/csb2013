<?php
include_once("../../login/check.php");
include_once("../../class/agenda.php");
include_once("../../class/materias.php");
include_once("../../class/alumno.php");
include_once("../../class/observaciones.php");
if(!empty($_POST)){
	$agenda=new agenda;
	$materia=new materias;
	$obser=new observaciones;
	$alumno=new alumno;
	$CodDocente=$_SESSION['CodUsuarioLog'];
	//echo "CodAl".$_POST['Cod'];
	/*if(isset($_POST['CodCurso'])){
		$CodCurso=$_POST['CodCurso'];
		$ag=$agenda->mostrarRegistroCurso($CodDocente,$CodCurso);
	}*/
	if(isset($_POST['CodMateria'])){
		$CodCurso=$_POST['CodCurso'];
		$CodMateria=$_POST['CodMateria'];
		$ag=$agenda->mostrarRegistroMateria($CodDocente,$CodCurso,$CodMateria);
	}
	/*if(isset($_POST['CodAlumno'])){
		$CodCurso=$_POST['CodCurso'];
		$CodMateria=$_POST['CodMateria'];
		$CodAlumno=$_POST['CodAlumno'];
		$ag=$agenda->mostrarRegistroAlumno($CodDocente,$CodCurso,$CodMateria,$CodAlumno);
	}*/
	//echo "CodCurso".$_POST['CodCurso'];
	//echo "CodMateri".$_POST['CodMateria'];
	
	?>
    <table class="tabla">
    	<tr class="cabecera"><td>Alumno</td><td>Materia</td><td>Observación</td><td width="60">Fecha</td><td>Detalle</td></tr>
        <?php
			foreach($ag as $a){
				$ma=$materia->mostrarMateria($a['CodMateria']);
				$ma=array_shift($ma);
				$o=$obser->mostrarObser($a['CodObservacion']);
				$o=array_shift($o);
				$al=$alumno->mostrarDatos($a['CodAlumno']);
				$al=array_shift($al);
			?>
            <tr class="contenido"><td><?php echo ucwords($al['Paterno']." ".$al['Nombres'])?></td><td><?php echo $ma['Abreviado']?></td><td><?php echo $o['Nombre'];?></td><td><?php echo date("d-m-Y",strtotime($a['Fecha']));?></td><td><?php echo $a['Detalle'];?></td></tr>
            <?php	
			}
		?>
    </table>
    <?php
}
?>