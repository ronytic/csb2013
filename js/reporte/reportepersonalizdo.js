function lanzadorC(CodCurso){
	//$.post('formulario.php',{"CodCurso":CodCurso},respuesta1);
}
function respuesta1(data){
	$("#contenido1").html(data);
	$("#formulario").submit(function(e) {
        e.preventDefault();
		//Sexo=$("select[name=sexo]").val();
		Campo1=$("select[name=campo1]").val();
		Campo2=$("select[name=campo2]").val();
		Borde=$("input[name=borde]").attr("checked");
		Blanco=$("input[name=blanco]").attr("checked");
		Sombreado=$("input[name=sombreado]").attr("checked");
		Cantidad=$("select[name=cantidad]").val();
		url="../../impresion/reporte/reportePersonalizado.php?CodCurso="+CodCurso+"&Campo1="+Campo1+"&Campo2="+Campo2+"&Borde="+Borde+"&Blanco="+Blanco+"&Cantidad="+Cantidad+"&Sombreado="+Sombreado;
		$("#contenido2").html('<a  class="boton corner-all" href="'+url+'">Abrir en otra Ventana"</a><hr/><iframe src="'+url+'" width="530" height="700"></iframe>');
    });	
}