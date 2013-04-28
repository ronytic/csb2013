var CodCurso;
var CodMateria;
var CodTrimestre;
$(document).ready(function(){
	var curso=$('input[name=Curso]:first');
	var materia=$('input[name=Materia]:first');
	var trimestre=$('input[name=Trimestre]:checked');
	CodCurso=curso.val();
	CodMateria=materia.val();
	CodTrimestre=trimestre.val();
	curso.next().addClass("seleccionado");
	materia.next().addClass("seleccionado");
	trimestre.next().addClass("seleccionado");
	$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
//	alert(CodCurso);
//	alert(CodMateria);
	$().datepicker();
	$('input[name=Curso]').change(function(e){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Materia]').change(function(e){
			materia.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			materia=$(this);
			CodMateria=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Trimestre]').change(function(e){
			trimestre.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			trimestre=$(this);
			CodTrimestre=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
});
function alumnos(data){
	$("#alumnos").html(data)
	$("tr.contenido").hover(function(e){
			var id=$(this).attr("rel");
			$("tr[rel="+id+"]").css("background-color",'#EBEBEB');
		},function(){
			var id=$(this).attr("rel");
			$("tr[rel="+id+"]").css("background-color",'#FFF');
		});
	$(".nota").mousedown(function(e) {
      	$(this).select();  
    }).mouseup(function(e) {
        e.preventDefault();
    });
	$(".nota").change(function(e) {
		var Nota=parseInt($(this).val());
		var CodAlumno=$(this).attr('data-row');
		var Col=$(this).attr('data-col');
		var CodCasilleros=$(this).attr('data-cod')
		var Tope=parseInt($('#t'+Col).attr("rel"));
		if(Nota<=Tope && Nota>=0){
			$.post('guardarnota.php',{'CodAlumno':CodAlumno,'NumeroNota':Col,'CodCasilleros':CodCasilleros,'Nota':Nota,'Rand':Math.random()},evaluarNota,"json");
		}else{
			alert("Nota Excedida del limite de: "+Tope)	;
			$(this).focus().select();
		}
    });
	$(".final").blur(function(e) {
		var Nota=parseInt($(this).val());
		var CodAlumno=$(this).attr('data-row');
		var Col=$(this).attr('data-col');
		var CodCasilleros=$(this).attr('data-cod');
		var Tope=parseInt($('#t'+Col).attr("rel"));
		
		if(Nota<=Tope && Nota>=0){
			$.post('guardarnota.php',{'CodAlumno':CodAlumno,'NumeroNota':Col,'CodCasilleros':CodCasilleros,'Nota':Nota,'Rand':Math.random()},evaluarNota,"json");
		}else{
			alert("Nota Excedida del limite de: "+Tope)	;
			$(this).focus().select();
		}
    }).keyup(function(e) {
		var Nota=parseInt($(this).val());
		var CodAlumno=$(this).attr('data-row');
		var Col=$(this).attr('data-col');
		var CodCasilleros=$(this).attr('data-cod');
		var Tope=parseInt($('#t'+Col).attr("rel"));
		if(Nota<=Tope && Nota>=0){
			$.post('guardarnota.php',{'CodAlumno':CodAlumno,'NumeroNota':Col,'CodCasilleros':CodCasilleros,'Nota':Nota,'Rand':Math.random()},evaluarNota,"json");
		}else{
			alert("Nota Excedida del limite de: "+Tope)	;
			$(this).focus().select();
		}
    });
	$("#guardarNotas").click(function(e) {
       alert("Sus Notas sean guardado Correctamente"); 
    });
	$(".cab1,.cab2,.cab3").hide();
	//$(".cab1").css({'padding':'0px','margin':'0px'}).find("td").each(function(index, element) {var ancho=parseInt($(element).css("width"))+1;$(element).css({'width':(ancho)});}).parent().css({'position':'fixed','width':$(".cab1").css("width")})
	//$(".cab2").css({'padding':'0px','margin':'0px'}).find("td").each(function(index, element) {var ancho=parseInt($(element).css("width"))+1;$(element).css({'width':(ancho)});}).parent().css({'position':'fixed','width':$(".cab2").css("width")})
	//$(".cab3").css({'padding':'0px','margin':'0px'}).find("td").each(function(index, element) {var ancho=parseInt($(element).css("width"))+1;$(element).css({'width':(ancho)});}).parent().css({'position':'fixed','width':$(".cab3").css("width")})
	
	//$(document).bind("scroll",function (e){});
}
function evaluarNota(data){
	var NotaAprobacion=parseInt($("input[name=NotaAprobacion]").val());
	//alert(NotaAprobacion);
	//alert(data);
	$('#resultado'+data.CodAlumno).val(data.Resultado);
	if(data.Dps!=0){$('#dps'+data.CodAlumno).val(data.Dps);}
	$('#notaf'+data.CodAlumno).val(data.NotaFinal);
	if(data.NotaFinal<NotaAprobacion){
		$('#notaf'+data.CodAlumno).addClass("rojo");
	}else{
		$('#notaf'+data.CodAlumno).removeClass("rojo");
	}
}