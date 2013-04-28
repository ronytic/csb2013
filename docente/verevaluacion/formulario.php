<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	?>
    <a href="ver.php?CodDocente=<?php echo $_POST['CodDocente']?>" class="boton corner-all">Ver Evaluación Docente</a>
    <?php	
}
?>