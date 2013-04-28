<?php
session_start();
include_once("../../login/check.php");
include_once("../../config.php");
include_once("../../class/curso.php");
include_once("../../class/docente.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/materias.php");
include_once("../../class/observaciones.php");
$titulo="Registro de Agenda";
$folder="../../";
$docente=new docente;
$curso=new curso;
$docmateriacurso=new docentemateriacurso;
$materias=new materias;
$observaciones=new observaciones;
$CodDocente=$_SESSION['CodUsuarioLog'];
$_SESSION['CodDocente']=$CodDocente;
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/docente/agenda.js"></script>
<script language="javascript">
$(document).ready(function(e) {

});
</script>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_2">
		<div class="titulo">Curso</div>    
        <div class="cuerpo"><?php
			
        	foreach($docmateriacurso->mostrarDocenteCurso($CodDocente) as $cur){
				$_SESSION['SexoAlumno']=$cur['SexoAlumno'];
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
    <div class="grid_3">
    	<div class="titulo">Alumno</div>
        <div class="cuerpo" id="alumnos"></div>
    </div>
    <div class="grid_7">
    	<div class="titulo">Observaciones</div>
        <div class="cuerpo">
        	<?php
			
        	foreach($observaciones->mostrarObservacionDoc() as $obs){
				?>
                <li style="width:130px;float:left"><input type="radio" name="Observacion" value="<?php echo $obs['CodObservacion'];?>" id="obs<?php echo $obs['CodObservacion'];?>" class="radio"/><label class="lradio capital" for="obs<?php echo $obs['CodObservacion'];?>"><?php echo $obs['Nombre'];?></label></li>
                <?php
				
			}
			
		?>
        <li class="clear"></li>
        <table>
        <tr><td class="verticalT">Fecha:</td><td><input type="text" id="fecha" size="10" class="verticalT" value="<?php echo date("d-m-Y");?>"/></td><td><label for="urgente">Urgente(Citación):</label></td><td><input type="checkbox" id="urgente"/></td></tr>
        <tr><td class="verticalT">Detalle:</td><td><textarea id="detalle"></textarea></td><td><input type="submit" value="Registrar" class="corner-all verticalT" id="registrar"/></td></tr>
        </table>
        Para eliminar una anotación, consulte al Regente.
        </div>
        
        <div class="titulo">Agenda de Alumno</div>
        <div class="cuerpo" id="Agenda">
        
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>