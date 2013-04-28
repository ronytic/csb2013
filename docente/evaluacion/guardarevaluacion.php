<?php
include_once("../../login/check.php");
include_once("../../class/evaluaciondocrespuestas.php");
if(!empty($_POST)){
	$evaluaciondocrespuestas=new evaluaciondocrespuestas;
	$CodCurso=$_POST['CodCurso'];
	$eva=$_POST['eva'];
	foreach($eva as $evaluacion){
		foreach($evaluacion as $doc=>$docente){
			foreach($docente as $pregunta => $opcion){
				$valores=array("CodCurso"=>$CodCurso,
								"CodDocente"=>$doc,
								"CodCampo"=>"'$pregunta'",
								"Valor"=>"'$opcion'"
								);
				$evaluaciondocrespuestas->insertar($valores);
				
			}
		}
	}
$titulo="Registro de Evaluación Docente";
$folder="../../";
include_once("../../cabecerahtml.php");
}
?>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
    <div class="grid_12">
    	<div class="centrar">
    	<h3>Muchas Gracias por Completar la Evaluación Docente</h3>
        <a href="<?php echo $folder?>" class="boton corner-all">Volver al Inicio</a>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../footer.php");?>