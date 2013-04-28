<?php
include_once("../../login/check.php");
include_once("../../class/tarea.php");
include_once("../../class/curso.php");
include_once("../../class/materias.php");
if(!empty($_SESSION)){
	$tarea=new tarea;
	$materias=new materias;
	$curso=new curso;
	$CodDocente=$_SESSION['CodUsuarioLog'];
	$CodCurso=$_POST['CodCurso'];
	$CodMateria=$_POST['CodMateria'];
	?>
    <table class="tabla">
            	<tr class="cabecera"><td>Nº</td><td>Materia</td><td>Curso</td><td>Tarea</td><td>Descripción</td><td>Presentar</td><td>Acción</td></tr>
     <?php
	$i=0;
	foreach($tarea->mostrarTareas($CodDocente,$CodCurso,$CodMateria) as $tar){$i++;
		$ma=$materias->mostrarMateria($tar['CodMateria']);
		$ma=array_shift($ma);
		$cu=$curso->mostrarCurso($tar['CodCurso']);
		$cu=array_shift($cu);
		?>
        	<tr class="contenido"><td><?php echo $i;?></td><td><?php echo $ma['Abreviado']?></td><td><?php echo $cu['Abreviado']?></td><td><?php echo $tar['Nombre'];?></td><td><?php echo $tar['Descripcion'];?></td><td><?php echo date("d-m-Y",strtotime($tar['FechaPresentacion']));?></td><td><a href="#" class="botonSecE corner-all eliminar" rel="<?php echo $tar['CodTarea']?>">x</a></td></tr>
          
        <?php
	}
	?>
      </table>
    <?php
}
?>