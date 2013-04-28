$(document).ready(function(e) {
	hora();
	/*$('#tarjetero').submit(function(e) {
    	var codigo=$('#CodBarra').val();
			$.post($(this).attr('action'),{'codBarra':codigo},function(data){
				$('#respuesta').html(data);	
			});
		e.preventDefault();
		$('#CodBarra').val('').focus();
    });*/
	$('#CodBarra').blur(function(e) {

        $(this).focus();
		
    });
});
function hora(){
	var hora=fecha.getHours();
	var minutos=fecha.getMinutes();
	var segundos=fecha.getSeconds();
	if(hora<10){ hora='0'+hora;}
	if(minutos<10){minutos='0'+minutos;}
	if(segundos<10){ segundos='0'+segundos;}
	fech=hora+":"+minutos+":"+segundos;
	document.getElementById("hora").innerHTML=fech;
	fecha.setSeconds(fecha.getSeconds()+1);
	setTimeout("hora()",1000);
}
