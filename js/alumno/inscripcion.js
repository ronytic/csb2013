// JavaScript Document
$(document).ready(function(e) {
	MontoKinder
	MontoGeneral
   $('#FechaNac').datepicker({altField: "#FechaNac", maxDate:"0 D",changeMonth: true,changeYear: true,yearRange:"c-100:c+10",dateFormat: 'dd-mm-yy'});
   $('#FechaRetiro').datepicker({altField: "#FechaRetiro",changeMonth: true,changeYear: true,dateFormat: 'dd-mm-yy'})
  // if($("#Ci").val()!=""){$('#CedulaId').attr('checked','checked');}
   /*$('#Ci').keyup(function(e) {
    	if($(this).val()!=""){
			$('#CedulaId').attr('checked','checked');	
		}else{
			$('#CedulaId').attr('checked','');	
		}
	});
	$('#CiMadre').keyup(function(e) {
    	if($(this).val()!=""){
			$('#CedulaIdM').attr('checked','checked');	
		}else{
			$('#CedulaIdM').attr('checked','');	
		}
	});
	$('#CiPadre').keyup(function(e) {
    	if($(this).val()!=""){
			$('#CedulaIdP').attr('checked','checked');	
		}else{
			$('#CedulaIdP').attr('checked','');	
		}
	});*/
	if($("#curso").val()!=1){$("#MontoPagar").val(MontoGeneral)}else{$("#MontoPagar").val(MontoKinder)}
	$("#curso").change(function(e) {
        if($(this).val()!=1){
			$("#MontoPagar").val(MontoGeneral);	
		}else{
			$("#MontoPagar").val(MontoKinder);	
		}
    });
	$('#MontoPagar').val(MontoGeneral-($("#MontoBeca").val()));
	$("#MontoBeca").keyup(function(e) {
		var valor=$(this).val();
		if(valor==""){valor=0;}
		valor=parseFloat(valor);
		var PorcentajeBeca=0;
		valor=valor.toFixed(2);
		if($("#curso").val()==1){
			PorcentajeBeca=(valor/MontoKinder)*100;
			$('#MontoPagar').val(MontoKinder-(valor));
		}else{
			PorcentajeBeca=(valor/MontoGeneral)*100;
			$('#MontoPagar').val(MontoGeneral-(valor));
		}

		$("#PorcentajeBeca").val(PorcentajeBeca.toFixed(2));
    });
	MontoBeca=$("#MontoBeca").val();
	$("#PorcentajeBeca").val(MontoBeca*100/MontoGeneral);	
	$("#PorcentajeBeca").keyup(function(e) {
		var valor=$(this).val();
		var MontoBeca=0;
		if($("#curso").val()==1){
			MontoBeca=(valor*MontoKinder)/100;
			$('#MontoPagar').val(MontoKinder-(MontoBeca.toFixed(2)));
		}else{
			MontoBeca=(valor*MontoGeneral)/100;
			$('#MontoPagar').val(MontoGeneral-(MontoBeca.toFixed(2)));
		}
		$("#MontoBeca").val(MontoBeca.toFixed(2));
		
    });
	$("form").on("submit",function(){
		$("input[type=submit]").attr("disabled","disabled");	
	})
	function habilita(){
		$("input[type=submit]").attr("disabled","");	
	}
});