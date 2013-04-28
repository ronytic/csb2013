var file="#";
var fileP="../../";
$(document).ready(function(){
	$('input[name=Curso]').change(function(){
		$('#respuesta').html("Cargando...");
		$.post("estadistica.php",{'CodCurso':CodCurso},respuesta);
	});
})
function respuesta(data){
	$('#respuesta').html(data);
}

function lanzador(CodAlumno){
	location.href="agenda.php?CodAl="+CodAlumno;
}