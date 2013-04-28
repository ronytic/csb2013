<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$CodAlumno=$_POST['CodAlumno'];
	?>
    Codigos de Barra por Curso
    <iframe src="../../impresion/codigos/alumnos/curso.php?CodCurso=<?php echo $CodCurso;?>" width="450" height="450"></iframe>
    <hr>
    Codigo del Barra del Alumno
    <iframe src="../../impresion/codigos/alumnos/alumnos.php?CodAlumno=<?php echo $CodAlumno;?>" width="450" height="450"></iframe>
    <?php	
}
?>