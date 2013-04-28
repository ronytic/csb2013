<?php  
include_once '../../login/check.php';
$folder="../../";
$titulo="Evaluación docente";
include_once '../../class/evaluaciondocpreguntas.php';
include_once("../../class/evaluaciondocrespuestas.php");
include_once '../../class/evaluaciondocopciones.php';
include_once '../../class/docentemateriacurso.php';
include_once '../../class/materias.php';
include_once '../../class/docente.php';
include_once '../../class/alumno.php';
include_once '../../class/curso.php';
$evaluaciondocpreguntas=new evaluaciondocpreguntas;
$evaluaciondocopciones=new evaluaciondocopciones;
$docentemateriacurso=new docentemateriacurso;
$evaluaciondocrespuestas=new evaluaciondocrespuestas;
$materias=new materias;
$docente=new docente;
$alumno=new alumno;
$curso=new curso;
$CodAlumno=$_SESSION['CodUsuarioLog'];
$al=array_shift($alumno->mostrar($CodAlumno,1));
$cur=array_shift($curso->mostrarCurso($al['CodCurso']));
$i=0;
?>
<?php include_once '../../cabecerahtml.php'; ?>
<?php include_once '../../cabecera.php'; ?>
<div class="container_12" id="cuerpo">
	<div class="grid_12">
		<table class="tabla">
			<tr>
				<td>Nombre:</td><td class="resaltar">ANONIMO</td><td>Curso:</td><td class="resaltar"><?php echo $cur['Nombre']; ?></td>
			</tr>
		</table>
	</div>
    <div class="clear"></div>
    <form action="guardarevaluacion.php" method="post"><input type="hidden" name="CodCurso" value="<?php echo $al['CodCurso'];?>" />
	<?php foreach ($docentemateriacurso->mostrarCursoSexo($al['CodCurso'],$al['Sexo']) as $key => $value):$i++; ?>
		<?php $mat=array_shift($materias->mostrarMateria($value['CodMateria'])); 
			$doc=array_shift($docente->mostrarDocente($value['CodDocente']));
			$direcfoto=$folder."images/docentes/".$doc['CodDocente'].".jpg";
			if(!file_exists($direcfoto))
				$direcfoto=$folder."images/docentes/0.jpg";
		?>
		<div class="grid_12">
        
			<div class="titulo corner-top"><?php echo ucwords($doc['Nombres']) ?> <?php echo ucfirst($doc['Paterno']) ?> - <?php echo $mat['Nombre'] ?></div>
			<div class="cuerpo">
				<div class="grid_2">
					<img src="<?php echo $direcfoto ?>" alt="Foto Docente" class="foto">
				</div>
				<div class="alpha grid_4">
					<div class="cuerpo preguntas">
						<?php foreach ($evaluaciondocpreguntas->mostrarTodo() as $key => $edp): ?>
							<div class="resaltar"><?php echo $edp['Pregunta'] ?></div>	
							<?php foreach ($evaluaciondocopciones->mostrarTodo("CodEvaluacionDocPreguntas=".$edp['CodEvaluacionDocPreguntas'],1) as $key => $edo): ?>
								<?php 
								switch ($edp['Tipo']) {
									case 'radio':
										?>
										<div class="horizontal">
										<label for="r-<?php echo $i?>-<?php echo $edo['CodEvaluacionDocOpciones'] ?>"><?php echo $edo['Opcion'];?>
										<input type="radio" name="eva[<?php echo $i?>][<?php echo $doc['CodDocente']?>][<?php echo $edp['CodEvaluacionDocPreguntas'] ?>]" id="r-<?php echo $i?>-<?php echo $edo['CodEvaluacionDocOpciones'] ?>" value="<?php echo $edo['CodEvaluacionDocOpciones'] ?>" required="required">
                                        </label>
										</div>
										<?php
										break;
								}
								 ?>
							<?php endforeach ?>
						<?php endforeach ?>
					</div>
				</div>
				<div class="omega grid_3">
					<div class="resaltar">Observaciones</div>
					<textarea name="eva[<?php echo $i?>][<?php echo $doc['CodDocente']?>][Observaciones]" rows="6"></textarea>
				</div>
				<div class="omega grid_3">
					<div class="resaltar">Sugerencias</div>
					<textarea name="eva[<?php echo $i?>][<?php echo $doc['CodDocente']?>][Sugerencias]" rows="6"></textarea>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	<?php endforeach ?>
	
    <div class="grid_12">
    	<div class="cuerpo corner-all centrar">
            	<input type="submit" value="Guardar Evaluación" class="corner-all"/>
        </div>
    </div>
    </form>
    <div class="clear"></div>
</div>
<?php include_once '../../footer.php'; ?>