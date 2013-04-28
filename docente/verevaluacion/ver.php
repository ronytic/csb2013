<?php
include_once("../../login/check.php");
$titulo="Ver Evaluación Docente";
$folder="../../";
$CodDocente=$_GET['CodDocente'];
include_once("../../class/evaluaciondocpreguntas.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/curso.php");
include_once("../../class/evaluaciondocopciones.php");
include_once("../../class/evaluaciondocrespuestas.php");
$evaluaciondocopciones=new evaluaciondocopciones;
$evaluaciondocrespuestas=new evaluaciondocrespuestas;
$docentemateriaucurso=new docentemateriacurso;
$evaluaciondocpreguntas=new evaluaciondocpreguntas;
$curso=new curso;
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_12">
    	<?php
        	foreach($docentemateriaucurso->mostrarDocenteCurso($CodDocente) as $docmateriacurso){
				$cur=array_shift($curso->mostrarCurso($docmateriacurso['CodCurso']));
				?>
                <div class="titulo corner-top"><?php echo $cur['Nombre'];?></div>
                <div class="cuerpo">
              		<table class="tabla">
					<?php
                        foreach($evaluaciondocpreguntas->mostrarTodo() as $evadocpreguntas){
                            ?><tr class="titulo"><td><?php echo $evadocpreguntas['Pregunta'];	?></td></tr>	
                            <?php foreach($evaluaciondocopciones->)?>
                            <tr><td></td></tr>                
                        <?php
                        }
                    ?>    
                    </table>
                </div>
                <?php
			}
		?>
    	
    </div>
</div>
<?php include_once("../../footer.php");?>