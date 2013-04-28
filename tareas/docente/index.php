<?php
include_once("../../login/check.php");
include_once("../../class/curso.php");
include_once("../../class/docente.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/materias.php");
$folder="../../";
$titulo="Registro de Tareas";
$docente=new docente;
$curso=new curso;
$docmateriacurso=new docentemateriacurso;
$materias=new materias;
$docent=$docente->mostrarDocenteUsuario($_SESSION['CodUsuarioLog']);
$docent=array_shift($docent);
$CodDocente=$_SESSION['CodUsuarioLog'];
?>
<?php
include_once("../../cabecerahtml.php");
?>

<script language="javascript" type="text/javascript" src="../../js/tareas/docente/tarea.js"></script>
<script language="javascript">
$(document).ready(function(e) {

});
</script>
<?php
include_once("../../cabecera.php");
?>
<div class="container_12" id="cuerpo">
	<div class="grid_2">
		<div class="titulo">Curso</div>    
        <div class="cuerpo"><?php
			
        	foreach($docmateriacurso->mostrarDocenteCurso($CodDocente) as $cur){
				$c=$curso->mostrarCurso($cur['CodCurso']);
				$c=$c=array_shift($c);
				?>
                <li><input type="radio" name="Curso" value="<?php echo $c['CodCurso'];?>" id="curso<?php echo $c['CodCurso'];?>" class="radio"/><label class="lradio capital" for="curso<?php echo $c['CodCurso'];?>"><?php echo $c['Nombre'];?></label></li>
                <?php
			}
		?></div>
        <div class="titulo">Materia</div>    
        <div class="cuerpo">
        <?php
			
        	foreach($docmateriacurso->mostrarDocenteMateria($CodDocente) as $docMat){
				$m=$materias->mostrarMateria($docMat['CodMateria']);
				$m=array_shift($m);
				?>
                <li><input type="radio" name="Materia" value="<?php echo $m['CodMateria'];?>" id="materia<?php echo $m['CodMateria'];?>" class="radio"/><label class="lradio capital" for="materia<?php echo $m['CodMateria'];?>"><?php echo $m['Nombre'];?></label></li>
                <?php
			}
		?>
        </div>
    </div>
    <div class="grid_4">
    	<div class="titulo">Tarea</div>
        <div class="cuerpo">
        	<table class="tabla">
            	<tr><td>Nombre de la Tarea:</td><td><input type="text" id="nombretarea" placeholder="Ej:Practica de Ortografia	"/></td></tr>
                <tr><td>Descripción de la Tarea:</td><td><textarea id="descripciontarea" rows="10"></textarea></td></tr>
                <tr><td>Fecha de Presentación</td><td><input type="text" size="10" id="fechaTarea" value="<?php echo date("d-m-Y");?>"/></td></tr>
            </table>
            <input type="submit" value="Guardar Tarea" class="corner-all" id="guardar"/>
        </div>
    </div>
    <div class="grid_6">
    	<div class="titulo">Tareas Guardadas</div>
        <div class="cuerpo" id="tareaGuardada">
        
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php
include_once("../../footer.php");
?>
</body>
</html>